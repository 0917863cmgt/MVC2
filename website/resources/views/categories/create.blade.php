@extends('components.layout')
@section('content')
    <body id="register">
    <section id="register-section" class="container-fluid">
        <div class="row register-header">
            <div class="col">
            </div>
            <div class="col">
                <h1 style="text-align: center">Create Category</h1>
            </div>
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="col">
            </div>
            <div class="col p-5 grey" style="border-radius:20px">
                <form class="register-form" id="register-create" method="POST" action="/categories/create">
                    @csrf
                    @method('POST')
                    <label class="register-label" for="is_parent">Is category parent:</label>
                    <label class="register-label" for="is_parent">0 = No / 1 = Yes</label>
                    <input class="register-input-text" type="text" name="is_parent" id="is_parent" required>

                    <label class="register-label" for="parent_id">Parent id:</label>
                    <input class="register-input-text" type="text" name="parent_id" id="parent_id">

                    <label class="register-label" for="name">Name:</label>
                    <input class="register-input-text" type="text" name="name" id="name" required>

                    <label class="register-label" for="slug">Slug:</label>
                    <input class="register-input-text" type="text" name="slug" id="slug" required>

                    <input class="register-input-submit" type="submit" name="submit" id="submit" value="Submit">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
            <div class="col">
            </div>
        </div>
    </section>
    </body>
@endsection
