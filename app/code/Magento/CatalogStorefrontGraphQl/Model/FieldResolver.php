<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\CatalogStorefrontGraphQl\Model;

use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use GraphQL\Language\AST\NodeKind;

/**
 * Resolve fields for query.
 */
class FieldResolver
{
    /**
     * @var array
     */
    private $fieldNamesCache = [];

    /**
     * Get fields for schema type.
     *
     * @param ResolveInfo $info
     * @param string[] $schemaTypes
     * @param string|null $requestedField
     * @return array
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function getSchemaTypeFields(ResolveInfo $info, array $schemaTypes, string $requestedField = null): array
    {
        $fieldNames = [];
        foreach ($info->fieldNodes as $node) {
            $schemaType = $node->name->value;

            if (!\in_array($schemaType, $schemaTypes, true)) {
                continue;
            }

            $schemaTypeHash = $schemaType . $requestedField;

            if (isset($this->fieldNamesCache[$schemaTypeHash])) {
                return $this->fieldNamesCache[$schemaTypeHash];
            }

            foreach ($node->selectionSet->selections as $selection) {
                if ($selection instanceof \GraphQL\Language\AST\InlineFragmentNode) {
                    continue;
                }
                if (null !== $requestedField && $selection->name->value !== $requestedField) {
                    continue;
                }

                if (!isset($selection->selectionSet, $selection->selectionSet->selections)) {
                    $fieldNames = $this->getFieldNames($selection, $fieldNames, (array)$info->fragments);
                } else {
                    if (null !== $requestedField && $selection->name->value == $requestedField) {
                        $fieldNames = $this->getFieldNames($selection, []);
                    } else {
                        $fieldNames[$selection->name->value] = $this->getFieldNames($selection, []);
                    }
                }
            }

            $fieldNames = $this->unwrapFragments($fieldNames, $info->fragments);
            $this->fieldNamesCache[$schemaTypeHash] = $fieldNames;
        }

        return $fieldNames;
    }

    /**
     * Get field names
     *
     * @param \GraphQL\Language\AST\SelectionNode $selection
     * @param array $fieldNames
     * @param \GraphQL\Language\AST\FragmentDefinitionNode[] $fragments
     * @return array
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    private function getFieldNames(
        \GraphQL\Language\AST\SelectionNode $selection,
        array $fieldNames,
        $fragments = []
    ): array {
        if (!isset($selection->selectionSet) && !isset($selection->selectionSet->selections)) {
            if ($selection->kind === NodeKind::FIELD && $selection->name->value) {
                $fieldNames[] = $selection->name->value;
            } elseif ($selection->kind === NodeKind::FRAGMENT_SPREAD && !empty($fragments)) {
                $fieldNames = $this->addFragmentFields($fieldNames, $fragments);
            }
            return $fieldNames;
        }

        foreach ($selection->selectionSet->selections as $itemSelection) {
            if ($itemSelection->kind === NodeKind::INLINE_FRAGMENT) {
                foreach ($itemSelection->selectionSet->selections as $inlineSelection) {
                    if ($itemSelection->typeCondition->kind === NodeKind::NAMED_TYPE) {
                        $namedType = $itemSelection->typeCondition->name->value;
                        $fieldNames = $this->getNestedFields($fieldNames, $inlineSelection, $namedType);
                        continue;
                    }

                    if ($inlineSelection->kind === NodeKind::INLINE_FRAGMENT) {
                        continue;
                    }
                    $fieldNames = $this->getNestedFields($fieldNames, $inlineSelection);
                }
                continue;
            }

            $fieldNames = $this->getNestedFields($fieldNames, $itemSelection);
        }

        return $fieldNames;
    }

    /**
     * @param array $fieldNames
     * @param array $fragments
     */
    private function addFragmentFields(array $fieldNames, array $fragments)
    {
        $fragmentFieldNames = [];
        /** @var \GraphQL\Language\AST\FragmentDefinitionNode $fragment */
        foreach ($fragments as $fragment) {
            /** @var \GraphQL\Language\AST\FieldNode $itemSelection */
            foreach ($fragment->selectionSet->selections as $itemSelection) {
                $fragmentFieldNames []= $this->getNestedFields($fieldNames, $itemSelection);
            }
        }

        $fieldNames = array_merge($fieldNames, ...$fragmentFieldNames);

        return $fieldNames;
    }

    /**
     * Unwrap graphql fragments in provided fields array
     *
     * @param array $fields
     * @param \GraphQL\Language\AST\FragmentDefinitionNode[] $fragments
     * @return array
     */
    private function unwrapFragments(array $fields, array $fragments): array
    {
        $result = [];
        foreach ($fragments as $fragment) {
            if (!in_array($fragment->name->value, $fields)) {
                continue;
            }

            foreach ($fragment->selectionSet->selections as $itemSelection) {
                $result = $this->getNestedFields($result, $itemSelection);
            }

            //Cleanup fragment fields
            $key = array_search($fragment->name->value, $fields);
            unset($fields[$key]);
        }

        return array_merge($result, $fields);
    }

    /**
     * Get nested fields
     *
     * @param array $fieldNames
     * @param mixed $itemSelection
     * @param string|null $nameType
     * @return array
     */
    private function getNestedFields(array $fieldNames, $itemSelection, $nameType = null): array
    {
        $itemSelectionName = $itemSelection->name->value;
        if (isset($itemSelection->selectionSet, $itemSelection->selectionSet->selections)) {
            $itemSelectionName = $nameType
                ? $nameType . '.' . $itemSelection->name->value
                : $itemSelection->name->value;

            $fieldNames[$itemSelectionName] = $this->getFieldNames($itemSelection, []);
        } else {
            $fieldNames[] = $itemSelectionName;
        }
        return $fieldNames;
    }
}
