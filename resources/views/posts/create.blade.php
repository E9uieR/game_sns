<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>PAGWM</title>
    </head>
    <body>
        <h1>PAGWM</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>題名</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>  <!-- type属性にはtext属性また、/>と記載することで終了タグを省略する-->
                <p class='title_error' style="color:red">{{$errors->first('post.title')}}</p>
            </div>
            <div class="body">
                <h2>内容</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                <p class='body_error' style="color:red">{{$errors->first('post.body')}}</p>
            </div>
            <div class="category">
                <h2>カテゴリー</h2>
                <select name="post[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>