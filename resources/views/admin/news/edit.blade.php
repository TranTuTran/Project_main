@extends('admin.masternews')
@section('content')
    <form action="{{route('admin.news.update', ['id' => $news->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" value="{{old('name',$news->title)}}"></td>
            </tr>
            <tr>
                <td>Author</td>
                <td><input type="text" name="author" value="{{old('name',$news->author)}}"></td>
            </tr>
            <tr>
                <td>Intro</td>
                <td><input type="text" name="intro" value="{{old('name',$news->intro)}}"></td>
            </tr>
            <tr>
                <td>Content</td>
                <td><input type="text" name="content" value="{{old('name',$news->content)}}"></td>
            </tr>
            <tr>
                <td>Image Old</td>
                <td><img src="{{asset('uploads_news/'.$news->image)}}" width="50px"></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image"></td>
            </tr>
            @if($news->status == 1)
                <tr>
                    <td>Status</td>
                    <td>
                        <input type="radio" name="status" value="1" checked >Show
                        <input type="radio" name="status" value="2">Hide
                    </td>
                </tr>
            @else 
                <tr>
                    <td>Status</td>
                    <td>
                        <input type="radio" name="status" value="1"  >Show
                        <input type="radio" name="status" value="2" checked>Hide
                    </td>
                </tr>
            @endif
            <tr>
                <td></td>
                <td><input type="submit" value="Update"></td>
            </tr>
        </table>
    </form>
@endsection
