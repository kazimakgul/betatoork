<body id="pricing">
    <div id="wrapper">
        <?php echo $this->element('business/dashboard/sidebar'); ?>
        <div id="content">
            <div class="menubar">
                <div class="sidebar-toggler visible-xs">
                    <i class="ion-navicon"></i>
                </div>

                <div class="page-title">
                    Time to choose a plan <small>(Wizard Example)</small>
                </div>
            </div>

            <div class="content-wrapper">

                <div class="pricing-wizard">
                    <h4>Simple Pricing, Wizard steps example</h4>

                    <div class="step-panel active choose-plan">
                        <div class="instructions">
                            <strong>Please choose a plan below</strong> that best suites your needs, you can cancel your account, upgrade or downgrade any time.
                        </div>

                        <div class="plans">
                            <div class="plan clearfix">
                                <div class="price">
                                    $19/mo
                                </div>
                                <div class="info">
                                    <div class="name">
                                        Basic
                                    </div>
                                    <div class="details">
                                        2 people, 1 workspace, 1 GB storage
                                    </div>
                                    <div class="select">
                                        <i class="fa fa-check"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="plan clearfix">
                                <div class="price">
                                    $29/mo
                                </div>
                                <div class="info">
                                    <div class="name">
                                        Studio
                                    </div>
                                    <div class="details">
                                        5 people, 1 workspace, 5 GB storage
                                    </div>
                                    <div class="select">
                                        <i class="fa fa-check"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="plan clearfix">
                                <div class="price">
                                    $39/mo
                                </div>
                                <div class="info">
                                    <div class="name">
                                        Team
                                    </div>
                                    <div class="details">
                                        10 people, 1 workspace, 10 GB storage
                                    </div>
                                    <div class="select">
                                        <i class="fa fa-check"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="plan clearfix">
                                <div class="price">
                                    $59/mo
                                </div>
                                <div class="info">
                                    <div class="name">
                                        Business
                                    </div>
                                    <div class="details">
                                        15 people, 1 workspace, 30 GB storage
                                    </div>
                                    <div class="select">
                                        <i class="fa fa-check"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="plan clearfix">
                                <div class="price">
                                    $149/mo
                                </div>
                                <div class="info">
                                    <div class="name">
                                        Enterprise
                                    </div>
                                    <div class="details">
                                        Unlimited people, workspaces and storage
                                    </div>
                                    <div class="select">
                                        <i class="fa fa-check"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="action">
                                <a href="#" class="btn btn-primary" data-step="1">
                                    Billing info 
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="step-panel billing">
                        <div class="secure clearfix">
                            <span class="lock pull-left">
                                <i class="fa fa-lock"></i>
                                Secure Billing Form
                            </span>
                            <div class="accepted-cards pull-right">
                                <img src="images/credit_card_types.gif" />
                            </div>
                        </div>

                        <form id="billing-form" class="form-horizontal" method="post" action="#" role="form">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Name on Card</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" placeholder="Your full name" name="customer[first_name]" />
                                </div>
                            </div>
                            <div class="address">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Address" name="customer[address]" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5 col-sm-offset-3">
                                        <input type="text" class="form-control mobile-margin-bottom" placeholder="City" name="customer[city]" />
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder="Zip/Postal" name="customer[state]" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5 col-sm-offset-3">
                                        <input type="text" class="form-control mobile-margin-bottom" placeholder="Country" name="customer[city]" />
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder="State" name="customer[state]" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Card Number</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" placeholder="••••  ••••  ••••  ••••" name="customer[first_name]" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Expiration & CVC</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control mobile-margin-bottom" placeholder="MM/YYY" name="customer[city]" />
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="CVC" name="customer[state]" />
                                </div>
                            </div>
                            
                            <div class="instructions">
                                Your credit card will be charged for the monthly <strong>Business plan of $59.00 USD</strong> on April 12, 2014. This will cover your subscription from: April 12, 2014 to May 12, 2014.
                            </div>

                            <div class="action clearfix">
                                <a href="#" data-step="0" class="btn btn-default pull-left">
                                    <i class="fa fa-chevron-left"></i>
                                    Plans
                                </a>
                                <a href="#" class="btn btn-success pull-right">
                                    Start my subscription
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <script type="text/javascript">
        $(function () {
            var $plans = $(".plans .plan");
            $plans.click(function () {
                $plans.removeClass("selected");
                $(this).addClass("selected");
            });

            var $step_triggers = $("[data-step]");
            var $step_panels = $(".step-panel");
            var $tabs = $(".steps .step");

            $step_triggers.click(function (e) {
                e.preventDefault();
                var go_to_step = $(this).data("step");
                
                $step_panels.removeClass("active");
                $step_panels.eq(go_to_step).addClass("active");

                $tabs.removeClass("active");
                $tabs.eq(go_to_step).addClass("active");

                if (go_to_step === 1) {
                    $("#billing-form input:text:eq(0)").focus();
                }
            });
        });
    </script>

</body>