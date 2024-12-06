@extends('admin.master')
@section('title', 'Category Create')
@section('content')

<form action="{{ route('admin.category.update', ['id' =>$category ->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="{{old('name', $category->name)}}"></td>
        </tr>
        <tr>
            <td>Old Images</td>
            <td><img src="{{asset('uploads/'.$category->image)}}" width="50px"/></td>
        </tr>
        <tr>
            <td>Images</td>
            <td><input type="file" name="image"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td>
                <textarea name="description" cols="30" rows="10">{{old('description', $category->description)}}</textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit"></td>
        </tr>
    </table>
</form>
@endsection
