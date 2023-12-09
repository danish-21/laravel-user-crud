<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .pagination {
            display: inline-block;
            padding-left: 0;
            margin-top: 20px;
            border-radius: 4px;
            list-style: none;
        }

        .page-item {
            display: inline-block;
            padding: 5px 10px;
            margin: 0 5px;
            line-height: 1.5;
            border: 1px solid #ddd;
            text-decoration: none;
            transition: background-color 0.15s ease;
        }

        .page-item:hover {
            background-color: #eee;
        }

        .page-item.active {
            background-color: #ddd;
        }

        .page-item.disabled {
            opacity: 0.5;
            cursor: default;
            pointer-events: none;
        }
    </style>
</head>
<body>

<nav aria-label="Page navigation">
    <ul

        class="pagination">
        @if ($paginator->onFirstPage())
            <li

                class="page-item disabled">


<span

    class="page-link">Previous</span>


            </li>
        @else
            <li

                class="page-item">


                <a

                    class="page-link"

                    href="{{ $paginator->previousPageUrl() }}"

                    rel="prev">Previous</a>


            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li

                    class="page-item disabled"><span

                        class="page-link">{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li

                            class="page-item active"><span

                                class="page-link">{{ $page }}</span></li>
                    @else
                        <li

                            class="page-item"><a

                                class="page-link"

                                href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li

                class="page-item">


                <a

                    class="page-link"

                    href="{{ $paginator->nextPageUrl() }}"

                    rel="next">Next</a>


            </li>
        @else
            <li

                class="page-item disabled">


<span

    class="page-link">Next</span>


            </li>
        @endif
    </ul>

</nav>
</body>
</html>

