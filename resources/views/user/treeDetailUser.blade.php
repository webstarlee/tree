<div class="row">
	<div class="col-xl-5">
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
                    $isfavorite = \App\Favorite::where('tree_id', $tree->id)->where('user_id', Auth::user()->id)->count();
                    $favor_string = "la-heart-o";
                    if ($isfavorite > 0) {
                        $favor_string = "la-heart";
                    }
                ?>
                <div class="tree-image-container" style="position: relative;">

                    <a href="javascript:void(0);" class="tree-img-favorite-btn" data-tree_id="{{$tree->id}}" title="add to favorite"> <i class="la {{$favor_string}}"></i> </a>
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
	<div class="col-xl-7">
		<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
			<div class="m-portlet__head">
				<div class="m-portlet__head-tools">
					<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                        <li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tree_info-history" role="tab">
								History
							</a>
						</li>
                        <li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tree_info-review" role="tab">
								Review
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="tab-content n-profile-enable">
                <div class="tab-pane" id="m_tree_info-history">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-12">
                                <form class="m-form--fit m-form--label-align-right" action="" method="post">
                                    <div class="form-group m-form__group">
                                        <p>{{$tree->history}}</p>
    								</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane active" id="m_tree_info-review">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-12">
                                <form class="m-form--fit m-form--label-align-right" id="user-tree-review-form" action="{{route('tree.review.store')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="tree_id" value="{{$tree->id}}">
                                    <div class="form-group m-form__group">
                                        <textarea class="form-control m-input" name="tree_review" placeholder="Write your review" rows="5" required>{{$tree->history}}</textarea>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                            <button type="submit" class="btn btn-outline-accent m-btn m-btn--custom m-btn--air">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="form-group m-form__group">
							<h4 class="m-widget1__title" style="border-bottom: 0.07rem dashed #ebedf2;margin-bottom: 20px;">
								Reviews
							</h4>
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
