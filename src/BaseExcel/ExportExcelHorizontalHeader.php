<?php

namespace Poc\BaseExcel\BaseExcel;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Poc\BaseExcel\Rows\RowItemHeader;

abstract class ExportExcelHorizontalHeader implements FromView, ShouldAutoSize, WithTitle
{
    public function __construct(public readonly RowItemHeader $headerItem)
    {
    }

    public function view(): View
    {
        $this->setHeaders();
        $headers      = $this->headerItem->getHeader();
        $numberColMax = $this->headerItem->getNumberColMax();
        $codesHeader  = $this->codesHeader();
        $this->headerItem->clear();
        return view(
            'sheet_header_horizontal',
            compact('headers', 'numberColMax', 'codesHeader')
        );
    }

    public function title(): string
    {
        return $this->titleSheet();
    }

    abstract public function setHeaders(): void;

    abstract public function codesHeader(): array;

    abstract public function titleSheet();
}