<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Cookins</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    
    <body>
    @if (Auth::check())
  
        
    @else
     @include('commons.navbar')
     
        <div class="top-wrapper">
            <div class="text-center my-auto" >
                <p id="top-font">Let's eat homemade food <br>anytime, anywhere</p>
                {!! link_to_route('signup.get', '新規登録', [], ['class' => 'signup-btn']) !!}
            </div>
        </div>
        
        <div class="main-wrapper">
        
            <div class="py-5">
                
                <div class="wrapper text-center">
                    <div class="container">
                        <h2 class="mb-5">cookinとは？</h2>
                        <p>世の中には主婦や大学生などのおいしい手料理が溢れています。<br></p>
                        <p>そんな人々の手作り料理がいつでもどこでも食事できる、提供できるサービスです。<br></p>
                        <p>さまざまな手作り料理を食事・披露しよう！</p>
                    <div>
                </div>
                
                <div class="wrapper text-center">
                    <div class="container">
                        <h2 class="mb-5">特 徴</h2>
                        <div class="row justify-content-around">
                            <div class="col-sm-3 my-5 py-4 bg-white rounded">
                                <h5 class="py-5">いつでもどこでも</h5>
                                <img src="img/img-item1.jpg" class="img-item mb-5 w-75 h-50">
                                <p><br>ああああああああああ<br>
                                   お近くの手作り料理を楽しもう</p>
                            </div>
                            <div class="col-sm-3 my-5 py-4 bg-white rounded">
                                <h5 class="py-5">豊富なメニュー</h5>
                                <img src="img/img-item2.jpg" class="img-item mb-5 w-75 h-50">
                                <p><br>食べたい料理がきっと見つかる<br>
                                   旅先ならではの特産料理も！</p>
                            </div>
                            <div class="col-sm-3 my-5 py-4 bg-white rounded">
                                <h5 class="py-5">副業</h5>
                                <img src="img/img-item3.jpg" class="img-item mb-5 w-75 h-50">
                                <p><br>主婦の副業に！<br>
                                   空いた時間で料理を届けよう</p>
                            </div>
                        </div>
                    </div>
                </div>
                        
                <div class="wrapper text-center">
                            <h3 class="mb-5">さあ、始めよう！</h3>
                             {!! link_to_route('signup.get', '新規登録', [], ['class' => 'signup-btn']) !!}
                </div>
                

            </div>
            
        </div>
        @include('commons.footer')
    @endif

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>