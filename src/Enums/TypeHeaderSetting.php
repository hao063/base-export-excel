<?php

namespace Poc\BaseExcel\Enums;

enum TypeHeaderSetting: int
{
    case ROW   = 1;
    case COL   = 2;
    case COLOR = 3;
    case TITLE = 4;
}