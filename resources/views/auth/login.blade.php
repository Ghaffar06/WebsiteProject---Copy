@extends('layouts.app')

@section('content')
<div class="modal fade" id="loginModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        
                            <h5 class="modal-title" id="exampleModalLabel"> Login</h5>
                            <div style="width:100em">
                            </div>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            
                            
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                  <label for="email" class="col-form-label">E-Mail :</label>
                                  <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Password :</label>
                                    <input type="password" class="form-control" id="password">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <a href="#">  Forgot password</a>
                            <a href="/register" class="mx-auto"> Register </a>
                            <button type="button" class="btn btn-primary">Login</button>
                            
                        </div>
                    </div>
                </div>
            </div>
@endsection
