<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Cookin home</title>
        <meta name="description" content="いつでもどこでも手作り料理を披露・食事できるサービスです。" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
        <link rel="stylesheet" href='css/style.css'>
        
        
        
    </head>
    
    <body>
    @if (Auth::check())
  
        
    @else
     @include('commons.navbar')
     
        <div class="top-wrapper text">
            <div class="text-center my-auto" >
                <p id="top-font">Let's eat homemade food <br>anytime, anywhere</p>
                {!! link_to_route('signup.get', '新規登録', [], ['class' => 'signup-btn']) !!}
            </div>
        </div>
        
       
        
           
        
        <div class="wrapper container text-center fadein">
           
                <h5 class="second-font">手作り料理を披露しませんか</h5>
                <h5 class="second-font">手作り料理を食事しませんか</h5>
                <h5 class="second-font">そんな自慢の手作り料理を提供できる</h5>
                <h5 class="second-font">そんな自慢の手作り料理が食事できる</h5>
                <h5 class="second-font-lg">夢のサービスが</h5>
                <h5 class="second-font-lg"><span>「 Cookin home 」</span>です。</h5>
                <h5 class="second-font">様々な手作り料理を食事・披露しよう！</h5>
           
        </div>
        
        <div class="wrapper item-wrapper">
            <div class="container">
                <h2 class="mb-5 text-center fadein" style="color:#fc2a58;">特 徴</h2>
                <div class="row justify-content-around fadein">
                    <div class="col-sm-3 my-5 py-3 item">
                        <h5 class="py-4 item text-center">いつでもどこでも</h5>
                        <p>人がいる限り料理はあります<br>
                           お近くの手作り料理を楽しもう！</p>
                    </div>
                    <div class="col-sm-3 my-5 py-3 item">
                        <h5 class="py-4 text-center item">豊富なメニュー</h5>
                        <p>食べたい料理がきっと見つかる<br>
                           旅先ならではの特産料理も！</p>
                    </div>
                    <div class="col-sm-3 my-5 pb-4 pt-3 item">
                        <h5 class="py-4 text-center item">副業</h5>
                        <p>空いた時間で料理を届けよう<br>
                        これであなたもインフルエンサーに！</p>
                    </div>
                </div>
            </div>
        </div>
                
        <div class="wrapper text-center bg-info">
            <div class="fadein">
                    <h3 class="mb-5 text-center text-light" style="font-weight:bold;">さあ、始めよう！</h3>
                     {!! link_to_route('signup.get', '新規登録', [], ['class' => 'signup-btn']) !!}
            </div>
        </div>
                

            
            
        
        @include('commons.footer')
    @endif

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
       
        <script src="js/t.min.js"></script>
        <script src="js/script.js"></script>
        
    </body>
</html>