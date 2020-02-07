@extends('layouts.app')



@section('content')

        <div class="row">
            <div class="col-xs-12 col-sm-3 text-left">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Поиск запчастей:</th>
                        </tr>
                    </thead>
                </table>
                <form action="{{ route('parts.search') }}" method="POST" class="search-parts">
                        {{ csrf_field() }}
                        <label class="btn btn-outline-secondary btn-block text-left ">
                            <input
                                value="code_catalog"
                                data-holder="код"
                                type="radio"
                                name="search_param"
                                id="option1"
                                autocomplete="off"
                                style="position:relative;top:3px;"
                                {{(@$filter['search_param']=='code_catalog')?'checked':''}}
                            > по каталожному номеру
                        </label>
                        <label class="btn btn-block btn-outline-secondary text-left ">
                            <input
                                value="name"
                                data-holder="название"
                                type="radio"
                                name="search_param"
                                id="option2"
                                autocomplete="off"
                                style="position:relative;top:3px;"
                                {{(@$filter['search_param']=='name')?'checked':''}}
                            > по названию детали
                        </label>

                        <input type="text" name="search_data" class="btn-outline-secondary form-control mb-2" id="input-code" value="{{@$filter['search_data']}}">

                        <button type="button" class="btn btn-outline-secondary btn-block" id="search-submit">Найти</button>

                        <a href="{{route('parts.index')}}" class="btn btn-outline-secondary btn-block">Сбросить</a>
                </form>
            </div>
            <div class="col-xs-12 col-sm-9">
                @if(!$parts->isEmpty())
                            @foreach($parts as $key=>$itemPart)
                            <div class="row flex align-items-lg-center py-1" style="border-bottom:1px solid #eaeaea;">
                                <div class="col-sm-1">{{++$key+(($parts->currentPage()-1)*$parts->perPage())}}</div>
                                <div class="col-sm-2">{{$itemPart->code_catalog}}</div>
                                <div class="col-sm-4">{{$itemPart->name}}</div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-5">{{$itemPart->full_count}}</div>
                                        <div class="col-sm-7">{{$itemPart->rouble}}</div>
                                    </div>
                                </div>
                                <div class="col-sm-2 text-right">
                                <button
                                    class="btn btn-success to-cart"
                                    data-id="{{$itemPart->id}}"
                                    data-url="{{route('cart.append',['id'=>$itemPart->id])}}"
                                >В корзину</button>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-center my-5">
                        {{ $parts->links() }}
                    </div>

                @endif

            </div>

        </div>

@endsection


