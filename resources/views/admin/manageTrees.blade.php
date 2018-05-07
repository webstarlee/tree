@extends('layouts.adminApp')

@section('title')
Manage Tree
@endsection

@section('pageTitle')
Tree Management
@endsection

@section('customStyle')
<link href="/css/addAdminWizard.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						<i class="la la-gear"></i> &nbsp;Tree Management
					</h3>
				</div>
			</div>
            <div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item">
						<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
                            <a href="#m-admin-new_video-modal" data-toggle="modal" class="btn btn-outline-accent m-btn m-btn--custom m-btn--icon m-btn--air">
    							<span>
    								<i class="la la-tree"></i>
    								<span>
    									New Tree
    								</span>
    							</span>
    						</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="m-portlet__body" style="padding-top: 10px;">
			<!--begin: Search Form -->
			<div class="m-form m-form--label-align-right m--margin-top-10 m--margin-bottom-10">
				<div class="row align-items-center">
					<div class="col-xl-8 order-2 order-xl-1">
						<div class="form-group m-form__group row align-items-center">
							<div class="col-md-4">
								<div class="m-input-icon m-input-icon--left">
									<input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
									<span class="m-input-icon__icon m-input-icon__icon--left">
										<span>
											<i class="la la-search"></i>
										</span>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end: Search Form -->
            <!--begin: Datatable -->
			<div class="m_datatable_video"></div>
			<!--end: Datatable -->
		</div>
	</div>

    <div class="modal fade m-custom-modal" id="m-admin-new_video-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel1">
						Add New Tree
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="cursor: pointer;">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
                <form action="{{route('admin.add.new.tree')}}" role="form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
    				<div class="modal-body">
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="video_title">
                                        Common Name:
                                    </label>
                                    <input type="text" class="form-control m-input" id="Common_Name" name="Common_Name" placeholder="Enter Common Name" required>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="video_title">
                                        Scientific Name:
                                    </label>
                                    <input type="text" class="form-control m-input" id="Scientific_Name" name="Scientific_Name" placeholder="Enter Scientific Name" required>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="video_title">
                                        Scientific Family Name:
                                    </label>
                                    <input type="text" class="form-control m-input" id="Scientific_Family_Name" name="Scientific_Family_Name" placeholder="Enter Scientific Family Name" required>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="video_title">
                                        Genus:
                                    </label>
                                    <input type="text" class="form-control m-input" id="Genus" name="Genus" placeholder="Enter Genus" required>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="video_title">
                                        Species:
                                    </label>
                                    <input type="text" class="form-control m-input" id="Species" name="Species" placeholder="Enter Species" required>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="m-form__content"></div>
                                <div class="form-group m-form__group">
                                    <label for="video_title">
                                        Campus Location:
                                    </label>
                                    <input type="text" class="form-control m-input" id="Campus_Location" name="Campus_Location" placeholder="Enter Campus Location" required>
                                </div>
                                <div class="m-form__content"></div>
                            </div>
                        </div>
    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn m-btn--air btn-outline-primary" data-dismiss="modal">
    						Close
    					</button>
    					<button type="submit" class="btn m-btn--air btn-outline-accent">
    						Submit
    					</button>
    				</div>
                </form>
			</div>
		</div>
    </div>
@endsection
@section('customScript')
    <script src="/js/datatable/loadTreesData.js" type="text/javascript"></script>
    <script type="text/javascript">

        $('.input_mask_date').datepicker({
            todayHighlight: true,
            autoclose: true,
            orientation: "bottom left",
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });
    </script>
    <script src="/js/customManage.js" type="text/javascript"></script>
@endsection
