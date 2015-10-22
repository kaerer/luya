<?php

namespace cmsadmin\blocks;

class LayoutBlock extends \cmsadmin\base\Block
{
    public $module = 'cmsadmin';

    public function name()
    {
        return 'Layout';
    }

    public function icon()
    {
        return 'view_column';
    }

    public function config()
    {
        return [
            'vars' => [
                ['var' => 'width', 'label' => 'Breite der ersten Spalte (maximal 12 Einheiten)', 'initvalue' => 6, 'type' => 'zaa-select', 'options' => [
                        ['value' => 1, 'label' => '1'],
                        ['value' => 2, 'label' => '2'],
                        ['value' => 3, 'label' => '3'],
                        ['value' => 4, 'label' => '4'],
                        ['value' => 5, 'label' => '5'],
                        ['value' => 6, 'label' => '6'],
                        ['value' => 7, 'label' => '7'],
                        ['value' => 8, 'label' => '8'],
                        ['value' => 9, 'label' => '9'],
                        ['value' => 10, 'label' => '10'],
                        ['value' => 11, 'label' => '11'],
                    ],
                ],
            ],
            'placeholders' => [
                ['var' => 'left', 'label' => 'Links'],
                ['var' => 'right', 'label' => 'Rechts'],
            ],
        ];
    }

    public function extraVars()
    {
        return [
            'leftWidth' => $this->getVarValue('width', 6),
            'rightWidth' => 12 - $this->getVarValue('width', 6),
        ];
    }

    public function twigFrontend()
    {
        return '<div class="row"><div class="col-md-{{ extras.leftWidth }}">{{ placeholders.left }}</div><div class="col-md-{{ extras.rightWidth }}">{{ placeholders.right }}</div></div>';
    }

    public function twigAdmin()
    {
        return '';
    }
}
