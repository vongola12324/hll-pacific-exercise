<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class Table extends Component
{
    public $rows;
    public $heading;
    public $tableClass;
    public $theadClass;
    public $headingRowClass;
    public $headingColClass;
    public $tbodyClass;
    public $rowClass;
    public $colClass;
    public $tfootClass;
    public $footRowClass;

    public function __construct($data, $heading = [], $classList = [])
    {
        if (!is_array($data)) {
            /** @var Collection $data */
            $this->rows = $data->toArray();
        } else {
            $this->rows = $data;
        }
        if (!$heading || $heading === []) {
            $this->heading = array_keys($this->rows[0]);
        } else {
            if (!is_array($heading)) {
                /** @var Collection $heading */
                $this->heading = $heading->toArray();
            } else {
                $this->heading = $heading;
            }
        }
        $this->tableClass = implode(
            ' ',
            array_merge(
                ['min-w-full', 'divide-y', 'divide-gray-200'],
                array_key_exists('table', $classList) ? $classList['table'] : []
            )
        );
        $this->theadClass = implode(
            ' ',
            array_merge(
                [],
                array_key_exists('thead', $classList) ? $classList['thead'] : []
            )
        );
        $this->headingRowClass = implode(
            ' ',
            array_merge(
                [],
                array_key_exists('headingRow', $classList) ? $classList['headingRow'] : []
            )
        );
        $this->headingColClass = implode(
            ' ',
            array_merge(
                ['px-6', 'py-3', 'text-left', 'text-xs', 'font-medium', 'text-gray-400', 'uppercase', 'tracking-wider'],
                array_key_exists('headingCol', $classList) ? $classList['headingCol'] : []
            )
        );
        $this->tbodyClass = implode(
            ' ',
            array_merge(
                ['text-gray-100', 'divide-y', 'divide-gray-200'],
                array_key_exists('tbody', $classList) ? $classList['tbody'] : []
            )
        );
        $this->rowClass = implode(
            ' ',
            array_merge(
                [],
                array_key_exists('row', $classList) ? $classList['row'] : []
            )
        );
        $this->colClass = implode(
            ' ',
            array_merge(
                ['px-6', 'py-4', 'whitespace-nowrap'],
                array_key_exists('col', $classList) ? $classList['col'] : []
            )
        );
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.table');
    }
}
