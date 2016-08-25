                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/contact') }}">
                             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                             <input type="hidden" name="id" id="id" value="{{ Auth::User()->id }}">
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="street">Street</label>
                                            <input type="text" class="form-control" name="street" id="street">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" name="city" id="city">
                                        </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="lga">Local Government Area</label>
                                            <input type="text" class="form-control" name="lga" id="lga">
                                        </div>
                                </div>
                                <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" name="state" id="state" >
                                        </div>
                                
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="state_origin">State of Origin</label>
                                            <input type="text" class="form-control" name="state_origin" id="state_origin">
                                        </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="col-md-10">
                                        <br><br>
                                        <div class="text-center">
                                            <button type="submit" name="btn" id="btn" class="btn btn-template-main"><i class="fa fa-check-circle"></i> Apply</button>
                                        </div>
                                        <br><br>
                                    </div>
                                </div>
                                <br><br><br>
                            </form>