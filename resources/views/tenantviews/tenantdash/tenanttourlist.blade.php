@extends('tenantviews.tenantlayout.tenantlayout')
@section('content')
<!-- Main Content -->
<div class="container">
    <h3 class="my-4">Tenants</h3>

    <!-- Add search form -->
    <form method="GET" action="{{ route('tenantlist') }}" class="form-inline float-right">
        <div class="input-group">
            <input type="text" class="form-control form-control-sm" style="max-width: 200px;" name="search" placeholder="Search" value="{{ request('search') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary btn-sm" style="font-size: 0.8rem; padding: 0.25rem 0.5rem;">Search</button>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Opening Hours</th>
                    <th>Entry Fee</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($touristSpots as $touristSpot)
                    <tr>
                        <td>{{ $touristSpot->name }}</td>
                        <td>{{ $touristSpot->location }}</td>
                        <td>{{ $touristSpot->description }}</td>
                        <td>{{ $touristSpot->category }}</td>
                        <td>{{ $touristSpot->opening_hours }}</td>
                        <td>{{ $touristSpot->entry_fee }}</td>
                        <td><img src="/storage/visitor/image/{{ $touristSpot->image }}" alt="Tourist Image" style="width: 100px; height: auto;"></td>
                        <td>
                        <a href="#" class="btn btn-primary btn-sm edit-tourist-spot" data-id="{{ $touristSpot->id }}" data-toggle="modal" data-target="#editModal">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm delete-tourist-spot" data-id="{{ $touristSpot->id }}" data-toggle="modal" data-target="#deleteModal">Delete</a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Tourist Spot Button -->
    
    <div class="row mt-3">
        <div class="col-12">
            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addTouristSpotModal">Add Tourist Spot</button>
        </div>
    </div>
    <!-- Add Tourist Spot Modal -->
    <div class="modal fade" id="addTouristSpotModal" tabindex="-1" role="dialog" aria-labelledby="addTouristSpotModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTouristSpotModalLabel">Add Tourist Spot</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for adding tourist spot -->
                    <form method="POST" action="{{ route('touristspot.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location:</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="lake">Lake</option>
                            <option value="falls">Falls</option>
                            <option value="spring">Spring</option>
                            <option value="river">River</option>
                            <option value="campsite">Campsite</option>
                            <option value="museum">Museum</option>
                            <option value="ocean">Ocean</option>
                            <option value="mountain">Mountain</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="opening_hours">Opening Hours:</label>
                        <input type="time" class="form-control" id="opening_hours" name="opening_hours" required>
                    </div>
                    <div class="form-group">
                        <label for="entry_fee">Entry Fee:</label>
                        <input type="text" class="form-control" id="entry_fee" name="entry_fee" required>
                    </div>
                    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                </div>
            </div>
        </div>
    </div>



<!-- Edit Modals -->
@foreach ($touristSpots as $touristSpot)
    <!-- Edit Modal for Tourist Spot -->
    <div class="modal fade" id="editModal-{{ $touristSpot->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel-{{ $touristSpot->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel-{{ $touristSpot->id }}">Edit Tourist Spot</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing tourist spot -->
                    <form id="edit-form" method="POST" action="{{ route('touristspot.update', ['touristSpot' => $touristSpot->id]) }}">
                        @csrf
                        @method('PUT')
                        <!-- Form content -->
                        <!-- Display Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $touristSpot->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ $touristSpot->location }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description">{{ $touristSpot->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="category">Category:</label>
                            <input type="text" class="form-control" id="category" name="category" value="{{ $touristSpot->category }}">
                        </div>

                        <div class="form-group">
                            <label for="opening_hours">Opening Hours:</label>
                            <input type="time" class="form-control" id="opening_hours" name="opening_hours" value="{{ $touristSpot->opening_hours }}">
                        </div>

                        <div class="form-group">
                            <label for="entry_fee">Entry Fee:</label>
                            <input type="number" class="form-control" id="entry_fee" name="entry_fee" value="{{ $touristSpot->entry_fee }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach




<!-- Ensure jQuery is included -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Ensure Bootstrap JavaScript is included -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('.edit-tourist-spot').on('click', function() {
            const id = $(this).data('id');
            $.get('/touristspot/' + id, function(data) {
                $('#editModal-' + id + ' input[name="name"]').val(data.name);
                $('#editModal-' + id + ' input[name="location"]').val(data.location);
                $('#editModal-' + id + ' textarea[name="description"]').val(data.description);
                $('#editModal-' + id + ' input[name="category"]').val(data.category);
                $('#editModal-' + id + ' input[name="opening_hours"]').val(data.opening_hours);
                $('#editModal-' + id + ' input[name="entry_fee"]').val(data.entry_fee);
                $('#editModal-' + id + ' #edit-form').attr('action', '/touristspot/' + id);
                $('#editModal-' + id).modal('show'); // Show the modal after populating data
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        $('.delete-tourist-spot').on('click', function(e) {
            e.preventDefault(); // Prevent the default click behavior
            
            const id = $(this).data('id');
            if (confirm('Are you sure you want to delete this tourist spot?')) {
                // Send a GET request to the server
                $.get('/touristspot/' + id + '/delete', function() {
                    // Refresh the page on success
                    location.reload();
                }).fail(function() {
                    alert('An error occurred while deleting the tourist spot.');
                });
            }
        });
    });
</script>

@endsection
