@extends('template.master')


@section('hienthinoidungoday')
    <form action="{{ route('them')}}" method="POST" enctype="multipart/form-data">
       @csrf
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" id=""></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="price" id=""></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input type="text" name="description" id=""></td>
            </tr>
            <tr>
                <td>Content</td>
                <td><input type="text" name="content" id=""></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image" id=""></td>
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
                <td><input type="submit" value="Create"></td>
            </tr>
        </table>
    </form>
@endsection