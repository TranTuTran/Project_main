@extends('admin.masternews')
@section('content')
    <form action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td>Author</td>
                <td><input type="text" name="author"></td>
            </tr>
            <tr>
                <td>Intro</td>
                <td><input type="text" name="intro"></td>
            </tr>
            <tr>
                <td>Content</td>
                <td><input type="text" name="content"></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <input type="radio" name="status" value="1" checked>Show
                    <input type="radio" name="status" value="2">Hide
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Send"></td>
            </tr>
        </table>
    </form>
@endsection
