<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <link rel="stylesheet" href="{{asset('css/chat.css')}}">

        <title>Chat com {{$dados->sendername}}</title>
    </head>
    <body>
        <input type="hidden" name="course" id="course" value="{{$course[0]->id}}">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <img src="https://via.placeholder.com/60" alt="Perfil">
                    <span>{{$dados->sendername}}</span>
                </div>
                <div class="card-body">
                
                </div>
                <div class="card-footer">
                    <input class="form-control" id="input_aguarde" type="text" placeholder="Aguarde.." readonly>

                    <div class="row" id="input_respostas">
                        <button class="btn btn-outline-light col" id="option_1">Opção 1</button>
                        <button class="btn btn-outline-light col" id="option_2">Opção 2</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="{{asset('js/chat.js')}}"></script>
        @foreach (json_decode($course[0]->path) as $message_id)
            @if(count($message_id) == 1)
                <script>
                    searchMessage({{$message_id[0]}});
                </script>
            
            @else
                <script>
                    searchMessage({{$message_id[0]}}, {{$message_id[1]}});
                </script>
            @endif
            
        @endforeach
    </body>
</html>