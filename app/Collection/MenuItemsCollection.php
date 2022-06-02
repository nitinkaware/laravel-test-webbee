<?php

namespace App\Collection;

use Illuminate\Database\Eloquent\Collection;

class MenuItemsCollection extends Collection
{
    public function getNestedMenuItems()
    {
        return $this->nest(
            $this->groupBy('parent_id')
        );
    }

    public function nest($groupedMenus)
    {
        return $this->addNestedChildrens($groupedMenus[''], $groupedMenus);
    }

    public function addNestedChildrens($menuItems, $allGroupedMenuItems)
    {
        $nestedMenuItemsWithChildrens = [];

        foreach ($menuItems as $menuItem) {
            $menuItem['children'] = [];

            if(isset($allGroupedMenuItems[$menuItem->id])) {
                $menuItem['children'] = $allGroupedMenuItems[$menuItem->id];
                $this->addNestedChildrens($allGroupedMenuItems[$menuItem->id], $allGroupedMenuItems);
            }

            $nestedMenuItemsWithChildrens[] = $menuItem;
        }

        return $nestedMenuItemsWithChildrens;
    }
}
