<?php

namespace Poc\BaseExcel\Services\SingleSheet;

use Poc\BaseExcel\BaseExcel\ExportExcelHorizontalHeader;
use Poc\BaseExcel\Config\Constant;
use Poc\BaseExcel\Rows\RowItemHeader;

class SingleSheetExportExcelService extends ExportExcelHorizontalHeader
{
    public function __construct(RowItemHeader $headerItem)
    {
        parent::__construct($headerItem);
    }
    public function setHeaders(): void
    {
        $row1 = $this->headerItem->setRow(1);
        $row1->setCol(1)->setBackgroundColor('#ff0303')->setTitle('Mùa thu');
        $row1->setCol(2)->setBackgroundColor('#ff0303')->setTitle('Hoa nở');
        $row1->setCol(1)->setBackgroundColor('#ff0303')->setTitle('Là vì em');
    }

    public function codesHeader(): array
    {
        return [
            'mua_thu',
            'hoa_no',
            'la_vi_em',
        ];
    }

    public function titleSheet()
    {
        return $this->title ?? Constant::TITLE_SHEET_DEFAULT;
    }
}