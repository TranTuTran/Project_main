@extends('admin.master')
@section('title', 'Category Create')
@section('content')

<form action="{{ route('admin.category.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Images</td>
            <td><input type="file" name="image"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td>
                <textarea name="description" id="" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit"></td>
        </tr>
    </table>
</form>
@endsection
