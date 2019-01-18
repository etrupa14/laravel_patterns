<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Technical Exam</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="container-fluid page-sort">
            <h1 class="page-header">
                Technical Exam
            </h1>

            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="alert alert-info">
                        Please input a string and select a method of sorting.
                    </div>
                    <form action="{{ route('sort') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group {{ (isset($errors) && $errors->has('sort_string')) ? 'has-error' : '' }}">
                            <label for="sort_string">
                                String :
                            </label>
                            <input
                                    type="text"
                                    id="sort_string"
                                    name="sort_string"
                                    value="{{ isset($data['sort_string']) ? $data['sort_string'] : '' }}"
                                    class="form-control">

                            @if((isset($errors) && $errors->has('sort_string')))
                                <div class="alert alert-danger alert-message">
                                    {{ $errors->first('sort_string') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group {{ (isset($errors) && $errors->has('sort_method')) ? 'has-error' : '' }}">
                            <label for="sort_method">Method:</label>
                            <select
                                    name="sort_method"
                                    id="sort_method"
                                    class="form-control">
                                <option value="">Please select a method</option>

                                @foreach($sortMethods as $sortMethod)
                                    <option
                                            value="{{ $sortMethod['value'] }}"
                                            {{ (isset($data['sort_method']) && ($data['sort_method'] == $sortMethod['value'])) ? 'selected' : '' }}>
                                        {{ $sortMethod['label'] }}
                                    </option>
                                @endforeach

                            </select>

                            @if(((isset($errors)) && $errors->has('sort_method')))
                                <div class="alert alert-danger alert-message">
                                    {{ $errors->first('sort_method') }}
                                </div>
                            @endif
                        </div>

                        <input type="submit" class="btn btn-primary">
                        <a href="{{ route('index') }}" class="btn btn-danger">Cancel</a>
                    </form>
                </div>

                <div class="col-md-6 col-xs-12">
                    @if(isset($sorted_string))
                        <div class="alert alert-success">
                            <h6>Result:</h6>
                            <p>{{ $sorted_string }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
