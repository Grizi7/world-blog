<!DOCTYPE html>
<html lang="en">
   
   @include('home.layouts.head')

   <body>
      <!-- header section start -->
      @include('home.layouts.header')
      <!-- header section end -->
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    @if($do == 'view')
                        <h1 class="mb-4 banner_taital" style="color: #2b2278">Your Posts</h1>
                        @if($posts->isEmpty())
                            <div class="alert custom-alert mt-2" role="alert" style="background-color: #e9f7fd;border: 1px solid #b6e0fe;color: #31708f;border-radius: 5px;padding: 15px;font-family: 'Arial', sans-serif;display: flex;align-items: center;">
                                <div class="custom-alert-icon" style="margin-right: 10px;font-size: 1.5rem;color: #31708f;">
                                    <i class="fa fa-info-circle"></i>
                                </div>
                                <div class="custom-alert-message" style="font-size: 1rem;font-weight: 500;line-height: 1.5;">
                                    You have no posts yet.
                                </div>
                            </div>
                        @else
                            <div class="table-responsive border rounded">
                                <table class="table table-hover mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                <td><img src="{{ asset('storage/'. $post->image) }}" alt="Post Image" style="width: 100px; height: 100px;"></td>
                                                <td>{{ $post->title }}</td>
                                                <td>
                                                    <button type="button" data-toggle="modal" data-target="#post_content_{{$post->id}}" class="btn btn-primary" style="font-size: 16px; color: #ffffff; background-color: #2b2278; text-align: center; padding: 0.9rem; border-radius: 30px; font-weight: bold;">Content</button>
                                                </td>
                                                <td>
                                                    @if($post->is_published)
                                                        <span class="badge badge-success" style="padding: 5px 10px;font-size: 0.85rem;">Published</span>
                                                        <br>
                                                        <a href="{{route('post', $post->id)}}"class="btn btn-primary btn-sm " style="font-size: 16px; color: #ffffff; background-color: #2b2278; text-align: center; padding: 0.4rem; border-radius: 10px; font-weight: bold;">See Post</a>
                                                    @else
                                                        <span class="badge badge-warning" style="padding: 5px 10px;font-size: 0.85rem;">Not Published</span>
                                                    @endif
                                                </td>
                                                <td>{{ $post->created_at->format('Y-m-d H:i') }}</td>
                                                <td>
                                                    <a href="{{ route('edit.post', $post->id) }}" class="btn btn-warning" style="font-size: 16px; color: #ffffff; background-color: #ffc107; text-align: center; padding: 0.9rem; border-radius: 30px; font-weight: bold;">Edit</a>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#post_delete_{{$post->id}}" style="font-size: 16px; color: #ffffff; background-color: #dc3545; text-align: center; padding: 0.9rem; border-radius: 30px; font-weight: bold;">Delete</button>
                                                </td>
                                            </tr>
                                            <div id="post_content_{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                                <div role="document" class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Post Content</strong>
                                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>{{$post->content}}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="post_delete_{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                                <div role="document" class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Delete Post</strong>
                                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center mt-4">
                                                                <i class="fa fa-exclamation-triangle text-danger fa-5x"></i>
                                                            </div>
                                                            <h3>Are you sure that you want to delete this post?</h3>
                                                            <p class="text-danger">You won't be able to revert this action!</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                                            <button  
                                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{$post['id']}}').submit();"
                                                                type="submit" class="btn btn-danger m-2">Delete</button>
                                                            <form id="delete-form-{{$post['id']}}" action="{{route('delete.post', $post->id)}}" method="POST" class="d-none">
                                                                @method('delete')
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        <a href="{{route('add.post')}}" class="btn btn-primary btn-lg m-2" style="width: 20%; font-size: 16px; color: #ffffff; background-color: #2b2278; text-align: center; padding: 0.9rem; border-radius: 30px; font-weight: bold;">Add Post</a>
                    @elseif($do == 'add')
                        <form action="{{route('store.post')}}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm mt-2">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-control-label">Title</label>
                                <input type="text" id="title" name="title" placeholder="Post Title" class="form-control" required value="{{old('title')}}">
                                @error('title')
                                    <p class="text-danger mt-1 mb-0">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">       
                                <label for="content" class="form-control-label">Content</label>
                                <textarea id="content" name="content" placeholder="Post Content" class="form-control" rows="5" required>{{old('content')}}</textarea>
                                @error('content')
                                    <p class="text-danger mt-1 mb-0">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-control-label">Image</label>
                                <input type="file" id="image" name="image" placeholder="Post Image" class="form-control-file">
                                @error('image')
                                    <p class="text-danger mt-1 mb-0">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group text-center">       
                                <button type="submit" class="btn btn-primary" style="width: 20%; font-size: 16px; color: #ffffff; background-color: #2b2278; text-align: center; padding: 0.9rem; border-radius: 30px; font-weight: bold;">Add</button>
                            </div>
                        </form>
                    @elseif($do == 'edit')
                        <form action="{{route('update.post', $post->id)}}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm mt-2">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title" class="form-control-label">Title</label>
                                <input type="text" id="title" name="title" placeholder="Post Title" class="form-control" required value="{{$post->title}}">
                                @error('title')
                                    <p class="text-danger mt-1 mb-0">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">       
                                <label for="content" class="form-control-label">Content</label>
                                <textarea id="content" name="content" placeholder="Post Content" class="form-control" rows="5" required>{{$post->content}}</textarea>
                                @error('content')
                                    <p class="text-danger mt-1 mb-0">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-control-label">Image</label>
                                <input type="file" id="image" name="image" placeholder="Post Image" class="form-control-file">
                                @error('image')
                                    <p class="text-danger mt-1 mb-0">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group text-center">       
                                <button type="submit" class="btn btn-primary" style="width: 20%; font-size: 16px; color: #ffffff; background-color: #2b2278; text-align: center; padding: 0.9rem; border-radius: 30px; font-weight: bold;">Update</button>
                            </div>
                        </form>    
                    @endif
                </div>
            </div>
        </div>
      <!-- footer section start -->
      @include('home.layouts.footer')
      <!-- footer section end -->
      <!-- Javascript files-->
      @include('home.layouts.scripts')    
   </body>
</html>
