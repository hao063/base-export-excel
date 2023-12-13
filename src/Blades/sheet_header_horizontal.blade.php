<style>

</style>
<table data-cols-width="10, 130">
    <thead>
    @foreach($headers as $header)
        <tr>
            @foreach($header['data'] as $item)
                <th height="50px"
                    colspan="{{count($header['data']) == 1 && $item['col'] == 1 ? $numberColMax : $item['col']}}"
                    style="text-align:center; vertical-align: center; background-color: {{$item['backgroundColor'] ?? ''}};border: thin solid black;">
                    {{$item['title']}}
                </th>
            @endforeach
        </tr>
    @endforeach
    </thead>
    <tbody>


    </tbody>
</table>

