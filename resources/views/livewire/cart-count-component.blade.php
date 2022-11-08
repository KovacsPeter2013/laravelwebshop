		<div class="wrap-icon-section minicart">
								<a href="#" class="link-direction">
									<i class="fa fa-shopping-basket" aria-hidden="true"></i>
									<div class="left-info">
										@if(Cart::count() > 0)
										<span class="index">{{Cart::count()}} termék</span>
										@endif
										<span class="title">Kosár</span>
									</div>
								</a>
							</div>
