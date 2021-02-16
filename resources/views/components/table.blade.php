<div class="flex flex-row min-w-full ">
    <div class="min-w-full -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200">
                <table {{ $attributes->merge(['class' => $tableClass]) }}>
                    <thead {{ $attributes->merge(['class' => $theadClass]) }}>
                    <tr  {{ $attributes->merge(['class' => $headingRowClass]) }}>
                        @foreach($heading as $head)
                            <th scope="col" {{ $attributes->merge(['class' => $headingColClass]) }}>
                                {{ Str::of($head)->replaceMatches('/[-_]/', ' ') }}
                            </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody {{ $attributes->merge(['class' => $tbodyClass]) }}>
                    @foreach($rows as $item)
                        <tr {{ $attributes->merge(['class' => $rowClass]) }}>
                            @foreach($heading as $head)
                                <td {{ $attributes->merge(['class' => $colClass]) }}>
                                    @if(isset($item[$head]))
                                        {{ $item[$head] }}
                                    @else
                                        {{ ${"{$head}"}($item) }}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
