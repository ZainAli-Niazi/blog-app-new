@extends('layout/app')

<div class="layout">
    @extends('layout/sidebar')

    <div class="container">

        <div class="row d-flex justify-content-center">
            <div class="row justify-content-center mt-4">
                <div class="col-md-10 d-flex justify-content-end">
                    <a href="{{ route('students.create') }}" class="btn btn-dark">Create</a>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white"> products</h3>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th></th>
                                <th>Name</th>
                                <th>Sku</th>
                                <th>Price</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            @if ($students->isNotEmpty())

                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>
                                            @if ($student->image != '')
                                                <img width="50"
                                                    src="{{ asset('uploads/products/' . $student->image) }}"
                                                    alt="">
                                            @endif
                                        </td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->sku }}</td>
                                        <td>{{ $student->price }}</td>
                                        <td>{{ \carbon\carbon::parse($student->Created_at)->format('d M, Y') }}</td>
                                        <td>
                                            <a href="{{ route('students.edit', $student->id) }}"
                                                class="btn btn-dark">Edit</a>
                                            <a href="#" onclick="deleteProduct({{ $student->id }});"
                                                class="btn btn-danger">Delete</a>
                                            <form id="delete-product-from-{{ $student->id }}"
                                                action="{{ route('products.destroy', $student->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function deleteProduct(id) {
        if (confirm("Are you sure you want to delete product?")) {
            document.getElementById("delete-product-from-" + id).submit();
        }
    }
</script>
@extends('layout/footer')
