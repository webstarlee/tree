@extends('layouts.adminApp')

@section('title')
Detail
@endsection

@section('pageTitle')
Tree Detail
@endsection

@section('content')
    <div class="row">
    	<div class="col-lg-5">
    		<div class="m-portlet m-portlet--full-height">
    			<div class="m-portlet__body">
                    <?php
                        $treeimg_url = "";
                        if ($tree->image == "default.jpg") {
                            $treeimg_url = "/uploads/default-tree.jpg";
                        } else {
                            if (file_exists('uploads/trees/'.$tree->image)) {
                                $treeimg_url = '/uploads/trees/'.$tree->image;
                            } else {
                                $treeimg_url = "/uploads/default-tree.jpg";
                            }
                        }
                    ?>
                    <div class="tree-image-container">
                        <a href="#tree-pic-change-modal" data-toggle="modal" class="tree-img-edit-btn"> <i class="la la-edit"></i> </a>
                        <img src="{{$treeimg_url}}" alt="" style="width: 100%;">
                    </div>
    				<div class="m-portlet__body-separator"></div>
    				<div class="m-widget1 m-widget1--paddingless">
    					<div class="m-widget1__item">
    						<div class="row m-row--no-padding align-items-center">
    							<div class="col">
    								<h3 class="m-widget1__title">
    									Common Name
    								</h3>
    							</div>
    							<div class="col m--align-right">
                                    <h3 class="m-widget1__title m--font-danger">
    									{{$tree->Common_Name}}
    								</h3>
    							</div>
    						</div>
    					</div>
                        <div class="m-widget1__item">
    						<div class="row m-row--no-padding align-items-center">
    							<div class="col">
    								<h3 class="m-widget1__title">
    									Scientific Name
    								</h3>
    							</div>
    							<div class="col m--align-right">
                                    <h3 class="m-widget1__title m--font-accent">
    									{{$tree->Scientific_Name}}
    								</h3>
    							</div>
    						</div>
    					</div>
                        <div class="m-widget1__item">
    						<div class="row m-row--no-padding align-items-center">
    							<div class="col">
    								<h3 class="m-widget1__title">
    									Scientific Family Name
    								</h3>
    							</div>
    							<div class="col m--align-right">
                                    <h3 class="m-widget1__title m--font-accent">
    									{{$tree->Scientific_Family_Name}}
    								</h3>
    							</div>
    						</div>
    					</div>
                        <div class="m-widget1__item">
    						<div class="row m-row--no-padding align-items-center">
    							<div class="col">
    								<h3 class="m-widget1__title">
    									Genus
    								</h3>
    							</div>
    							<div class="col m--align-right">
                                    <h3 class="m-widget1__title m--font-accent">
    									{{$tree->Genus}}
    								</h3>
    							</div>
    						</div>
    					</div>
                        <div class="m-widget1__item">
    						<div class="row m-row--no-padding align-items-center">
    							<div class="col">
    								<h3 class="m-widget1__title">
    									Species
    								</h3>
    							</div>
    							<div class="col m--align-right">
                                    <h3 class="m-widget1__title m--font-accent">
    									{{$tree->Species}}
    								</h3>
    							</div>
    						</div>
    					</div>
                        <div class="m-widget1__item">
    						<div class="row m-row--no-padding align-items-center">
    							<div class="col">
    								<h3 class="m-widget1__title">
    									Campus Location
    								</h3>
    							</div>
    							<div class="col m--align-right">
                                    <h3 class="m-widget1__title m--font-accent">
    									{{$tree->Campus_Location}}
    								</h3>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="col-lg-7">
    		<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
    			<div class="m-portlet__head">
    				<div class="m-portlet__head-tools">
    					<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
    						<li class="nav-item m-tabs__item">
    							<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tree_info-basic" role="tab">
    								Basic Info
    							</a>
    						</li>
                            <li class="nav-item m-tabs__item">
    							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tree_info-history" role="tab">
    								History
    							</a>
    						</li>
                            <li class="nav-item m-tabs__item">
    							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tree_info-location" role="tab">
    								Location
    							</a>
    						</li>
                            <li class="nav-item m-tabs__item">
    							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tree_info-review" role="tab">
    								Review
    							</a>
    						</li>
    					</ul>
    				</div>
    			</div>
    			<div class="tab-content n-profile-enable">
    				<div class="tab-pane active" id="m_tree_info-basic">
						<div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-12">
                                    <form class="m-form m-form--fit m-form--label-align-right" action="{{route('admin.update.tree.basic')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="tree_id" value="{{$tree->id}}">
                                        <div class="form-group m-form__group row">
            								<label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-form-label">
            									Common Name
            								</label>
            								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            									<input class="form-control m-input" type="text" name="Common_Name" value="{{$tree->Common_Name}}" />
            								</div>
            							</div>
                                        <div class="form-group m-form__group row">
            								<label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-form-label">
            									Scientific Name
            								</label>
            								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            									<input class="form-control m-input" type="text" name="Scientific_Name" value="{{$tree->Scientific_Name}}" />
            								</div>
            							</div>
                                        <div class="form-group m-form__group row">
            								<label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-form-label">
            									Scientific Family Name
            								</label>
            								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            									<input class="form-control m-input" type="text" name="Scientific_Family_Name" value="{{$tree->Scientific_Family_Name}}" />
            								</div>
            							</div>
                                        <div class="form-group m-form__group row">
            								<label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-form-label">
            									Genus
            								</label>
            								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            									<input class="form-control m-input" type="text" name="Genus" value="{{$tree->Genus}}" />
            								</div>
            							</div>
                                        <div class="form-group m-form__group row">
            								<label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-form-label">
            									Species
            								</label>
            								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            									<input class="form-control m-input" type="text" name="Species" value="{{$tree->Species}}" />
            								</div>
            							</div>
                                        <div class="form-group m-form__group row">
            								<label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-form-label">
            									Campus Location
            								</label>
            								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            									<input class="form-control m-input" type="text" name="Campus_Location" value="{{$tree->Campus_Location}}" />
            								</div>
            							</div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        										<button type="submit" class="btn btn-outline-accent m-btn m-btn--custom m-btn--air">Save Change</button>
        									</div>
            							</div>
                                    </form>
                                </div>
                            </div>
						</div>
    				</div>
                    <div class="tab-pane" id="m_tree_info-history">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-12">
                                    <form class="m-form--fit m-form--label-align-right" action="{{route('admin.update.tree.history')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="tree_id" value="{{$tree->id}}">
                                        <div class="form-group m-form__group">
        									<textarea class="form-control m-input" name="tree_history" id="tree_history" placeholder="Write History of this tree" rows="5">{{$tree->history}}</textarea>
        								</div>
                                        <div class="form-group m-form__group row">
        									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
        										<button type="submit" class="btn btn-outline-accent m-btn m-btn--custom m-btn--air">Save Change</button>
        									</div>
            							</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="m_tree_info-location">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-12">
                                    <form class="m-form m-form--fit m-form--label-align-right" action="{{route('admin.update.tree.location')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="tree_id" value="{{$tree->id}}">
                                        <div class="form-group m-form__group row">
            								<label for="example-text-input" class="col-lg-2 col-md-2 col-sm-3 col-xs-12 col-form-label">
            									Location X
            								</label>
            								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
            									<input class="form-control m-input" type="text" name="location_x" value="{{$tree->x}}" />
            								</div>
            							</div>
                                        <div class="form-group m-form__group row">
            								<label for="example-text-input" class="col-lg-2 col-md-2 col-sm-3 col-xs-12col-form-label">
            									Location Y
            								</label>
            								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
            									<input class="form-control m-input" type="text" name="location_y" value="{{$tree->y}}" />
            								</div>
            							</div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12"></div>
        									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
        										<button type="submit" class="btn btn-outline-accent m-btn m-btn--custom m-btn--air">Save Change</button>
        									</div>
            							</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="m_tree_info-review">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group">
                                <div class="m-widget3">
                                    @include('user.treeReview')
                                </div>
                            </div>
                        </div>
                    </div>
    			</div>
    		</div>
    	</div>
    </div>

    <div class="modal fade m-custom-modal" id="tree-pic-change-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						Update Tree Image
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="cursor: pointer;">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
                <form action="{{route('admin.update.tree.image')}}" role="form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="tree_id" value="{{$tree->id}}">
    				<div class="modal-body">
	                    <div id="m-tree_pic-slim">
	                        <input type="file" name="slim[]" required/>
	                    </div>
    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-outline-accent m-btn m-btn--custom m-btn--air" data-dismiss="modal">
    						Close
    					</button>
    					<button type="submit" class="btn btn-outline-accent m-btn m-btn--custom m-btn--air">
    						Update
    					</button>
    				</div>
                </form>
			</div>
		</div>
	</div>
@endsection

@section('customScript')
    <script type="text/javascript">
        var user_cover_cropper = new Slim(document.getElementById('m-tree_pic-slim'), {
            minSize: {
                width: 100,
                height: 100,
            },
            download: false,
            label: i18n.language.profile.drop_your_img_here,
            statusImageTooSmall: i18n.language.profile.image_too_small_slim,
        });
    </script>
    <script src="/js/customProfile.js" type="text/javascript"></script>
@endsection
