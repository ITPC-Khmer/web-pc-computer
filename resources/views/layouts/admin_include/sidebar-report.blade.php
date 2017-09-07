<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <section class="sidebar" style="padding-left: 15px;">
                <div class="col-md-12">
                    <h4><b><u>{{_t('Select Report Type')}}</u></b></h4>
                </div>
                <a href="#">
                    <span><b>{{_t('Product Promotion List')}}</b></span>
                </a>
                <p>
                    <input data-url="{{url('/report/promotion-expire/list')}}" type="radio" name="name-report-option" class="minimal report-option"> {{_t('List')}}<br>
                </p>


                <a href="#">
                    <span><b>{{_t('Sale Order')}}</b></span>
                </a>
                <p>
                    <input data-url="{{url('/report/order/list')}}" type="radio" name="name-report-option" class="minimal report-option"> {{_t('List')}}<br>
                </p>
                <p>
                    <input data-url="{{url('/report/order/detail')}}" type="radio" name="name-report-option" class="minimal report-option"> {{_t('Detail')}}<br>
                </p>

                <a href="#">
                    <span><b>{{_t('Order Pending')}}</b></span>
                </a>
                <p>
                    <input data-url="{{url('/report/pending/list')}}" type="radio" name="name-report-option" class="minimal report-option"> {{_t('List')}}<br>
                </p>
                <p>
                    <input data-url="{{url('/report/pending/detail')}}" type="radio" name="name-report-option" class="minimal report-option"> {{_t('Detail')}}<br>
                </p>

                <a href="#">
                    <span><b>{{_t('Order Paid')}}</b></span>
                </a>
                <p>
                    <input data-url="{{url('/report/paid/list')}}" type="radio" name="name-report-option" class="minimal report-option"> {{_t('List')}}<br>
                </p>
                <p>
                    <input data-url="{{url('/report/paid/detail')}}" type="radio" name="name-report-option" class="minimal report-option"> {{_t('Detail')}}<br>
                </p>
                <a href="#">
                    <span><b>{{_t('Order Cancel')}}</b></span>
                </a>
                <p>
                    <input data-url="{{url('/report/cancel/list')}}" type="radio" name="name-report-option" class="minimal report-option"> {{_t('List')}}<br>
                </p>
                <p>
                    <input data-url="{{url('/report/cancel/detail')}}" type="radio" name="name-report-option" class="minimal report-option"> {{_t('Detail')}}<br>
                </p>


            </section>
        </ul>

    </div>

</div>