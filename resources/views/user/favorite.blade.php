@extends('layouts.app')
@section('title')
Favorite Trees
@endsection
@section('pageTitle')
Favorite Trees
@endsection
@section('content')
    <div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						<i class="la la-gear"></i> &nbsp;View Tree
					</h3>
				</div>
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
    <div class="tree-detail-view-container">
        <div class="overlay-div"></div>
        <a href="javascript: void(0);" id="detailview-close-btn" class="detail-modal-close-btn"> <i class="la la-close"></i> </a>
        <div class="tree-detail-content">
            <div style="padding: 30px;">
                <p style="margin: 0;font-size: 3em;font-weight: bold;text-align: center;color: #444343;">Tree Detail</p>
            </div>
            <div class="real-data-container" id="tree-user-detail-popup-container" style="padding: 10px 25px;"></div>
            <div class="data-loading-animation-div">
                <img src="/assets/images/Loading_icon.gif" alt="">
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script src="/js/datatable/loadUserFavoriteTreeData.js" type="text/javascript"></script>
@endsection
