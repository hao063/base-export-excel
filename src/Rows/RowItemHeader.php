<?php

namespace Poc\BaseExcel\Rows;

use Poc\BaseExcel\Config\Constant;

class RowItemHeader
{
    private int    $row;
    private string $colIndex;
    private array  $headers;
    private int    $numberColMax;

    public function setRow(int $row): static
    {
        $this->row       = $row;
        $this->headers[] = [
            'row' => $this->row,
        ];
        return $this;
    }

    public function setCol(int $col): static
    {
        $this->colIndex                                                  = fake()->uuid();
        $this->headers[$this->row - 1]['data'][$this->colIndex]['col']   = $col;
        $this->headers[$this->row - 1]['data'][$this->colIndex]['title'] = '';
        return $this;
    }

    public function setBackgroundColor(string $backgroundColor): static
    {
        $this->headers[$this->row - 1]['data'][$this->colIndex]['backgroundColor'] = $backgroundColor;
        return $this;
    }

    public function setTitle(string $title): static
    {
        $this->headers[$this->row - 1]['data'][$this->colIndex]['title'] = $title;
        return $this;
    }

    public function getHeader(): array
    {
        return $this->headersValue();
    }

    public function getNumberColMax(): int
    {
        return $this->numberColMax ?? Constant::NUMBER_COL_MAX_DEFAULT;
    }

    public function clear(): void
    {
        $this->headers = [];
    }

    private function headersValue(): array
    {
        $data = [];
        foreach ($this->headers as $header) {
            if (!isset($header['data'])) {
                continue;
            }
            $this->setNumberColMax($header['data']);
            $header['data'] = array_values($header['data']);
            $data[]         = $header;
        }
        return $data;
    }

    private function setNumberColMax(array $data): void
    {
        $max      = $this->numberColMax ?? Constant::NUMBER_COL_MAX_DEFAULT;
        $valueCol = 0;
        foreach ($data as $item) {
            $valueCol += $item['col'];
        }
        $this->numberColMax = max($valueCol, $max);
    }

}