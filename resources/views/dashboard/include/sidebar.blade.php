<div class="sidebar p-2 py-md-3 @@cardClass">
    <div class="container-fluid">

        <div class="title-text d-flex align-items-center mb-4 mt-1">
        </div>
        <img class="avatar img-thumbnail rounded-circle shadow" src="{{ asset('images/dashboard/like4like.png') }}"
            alt="">
        <div class="main-menu flex-grow-1">
            <ul class="menu-list">
                <li class="divider py-2 lh-sm"><span class="small">MAIN</span><br> <small class="text-muted">Unique
                        dashboard designs </small></li>
                <li>
                    <a class="m-link active" href="{{ route('dashboard.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            <path class="fill-secondary" fill-rule="evenodd"
                                d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                        </svg>
                        <span class="ms-2">لوحه التحكم</span>
                    </a>
                </li>
                <li>
                    @can('قائمة المشرفين')
                        <a class="m-link" href="{{ route('users.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M15 14C15 14 16 14 16 13C16 12 15 9 11 9C7 9 6 12 6 13C6 14 7 14 7 14H15ZM7.022 13C7.01461 12.999 7.00727 12.9976 7 12.996C7.001 12.732 7.167 11.966 7.76 11.276C8.312 10.629 9.282 10 11 10C12.717 10 13.687 10.63 14.24 11.276C14.833 11.966 14.998 12.733 15 12.996L14.992 12.998C14.9874 12.9988 14.9827 12.9995 14.978 13H7.022ZM11 7C11.5304 7 12.0391 6.78929 12.4142 6.41421C12.7893 6.03914 13 5.53043 13 5C13 4.46957 12.7893 3.96086 12.4142 3.58579C12.0391 3.21071 11.5304 3 11 3C10.4696 3 9.96086 3.21071 9.58579 3.58579C9.21071 3.96086 9 4.46957 9 5C9 5.53043 9.21071 6.03914 9.58579 6.41421C9.96086 6.78929 10.4696 7 11 7ZM14 5C14 5.39397 13.9224 5.78407 13.7716 6.14805C13.6209 6.51203 13.3999 6.84274 13.1213 7.12132C12.8427 7.3999 12.512 7.62087 12.1481 7.77164C11.7841 7.9224 11.394 8 11 8C10.606 8 10.2159 7.9224 9.85195 7.77164C9.48797 7.62087 9.15726 7.3999 8.87868 7.12132C8.6001 6.84274 8.37913 6.51203 8.22836 6.14805C8.0776 5.78407 8 5.39397 8 5C8 4.20435 8.31607 3.44129 8.87868 2.87868C9.44129 2.31607 10.2044 2 11 2C11.7956 2 12.5587 2.31607 13.1213 2.87868C13.6839 3.44129 14 4.20435 14 5Z">
                                </path>
                                <path class="fill-secondary" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.216 14C5.06776 13.6878 4.99382 13.3455 5 13C5 11.645 5.68 10.25 6.936 9.28C6.30909 9.08684 5.65595 8.99237 5 9C1 9 0 12 0 13C0 14 1 14 1 14H5.216Z">
                                </path>
                                <path class="fill-secondary"
                                    d="M4.5 8C5.16304 8 5.79893 7.73661 6.26777 7.26777C6.73661 6.79893 7 6.16304 7 5.5C7 4.83696 6.73661 4.20107 6.26777 3.73223C5.79893 3.26339 5.16304 3 4.5 3C3.83696 3 3.20107 3.26339 2.73223 3.73223C2.26339 4.20107 2 4.83696 2 5.5C2 6.16304 2.26339 6.79893 2.73223 7.26777C3.20107 7.73661 3.83696 8 4.5 8V8Z">
                                </path>
                            </svg>
                            <span class="ms-2">المشرفين</span>
                        </a>
                    @endcan
                    @can('عرض الادوار')
                        <a class="m-link" href="{{ route('roles.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M15 14C15 14 16 14 16 13C16 12 15 9 11 9C7 9 6 12 6 13C6 14 7 14 7 14H15ZM7.022 13C7.01461 12.999 7.00727 12.9976 7 12.996C7.001 12.732 7.167 11.966 7.76 11.276C8.312 10.629 9.282 10 11 10C12.717 10 13.687 10.63 14.24 11.276C14.833 11.966 14.998 12.733 15 12.996L14.992 12.998C14.9874 12.9988 14.9827 12.9995 14.978 13H7.022ZM11 7C11.5304 7 12.0391 6.78929 12.4142 6.41421C12.7893 6.03914 13 5.53043 13 5C13 4.46957 12.7893 3.96086 12.4142 3.58579C12.0391 3.21071 11.5304 3 11 3C10.4696 3 9.96086 3.21071 9.58579 3.58579C9.21071 3.96086 9 4.46957 9 5C9 5.53043 9.21071 6.03914 9.58579 6.41421C9.96086 6.78929 10.4696 7 11 7ZM14 5C14 5.39397 13.9224 5.78407 13.7716 6.14805C13.6209 6.51203 13.3999 6.84274 13.1213 7.12132C12.8427 7.3999 12.512 7.62087 12.1481 7.77164C11.7841 7.9224 11.394 8 11 8C10.606 8 10.2159 7.9224 9.85195 7.77164C9.48797 7.62087 9.15726 7.3999 8.87868 7.12132C8.6001 6.84274 8.37913 6.51203 8.22836 6.14805C8.0776 5.78407 8 5.39397 8 5C8 4.20435 8.31607 3.44129 8.87868 2.87868C9.44129 2.31607 10.2044 2 11 2C11.7956 2 12.5587 2.31607 13.1213 2.87868C13.6839 3.44129 14 4.20435 14 5Z">
                                </path>
                                <path class="fill-secondary" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.216 14C5.06776 13.6878 4.99382 13.3455 5 13C5 11.645 5.68 10.25 6.936 9.28C6.30909 9.08684 5.65595 8.99237 5 9C1 9 0 12 0 13C0 14 1 14 1 14H5.216Z">
                                </path>
                                <path class="fill-secondary"
                                    d="M4.5 8C5.16304 8 5.79893 7.73661 6.26777 7.26777C6.73661 6.79893 7 6.16304 7 5.5C7 4.83696 6.73661 4.20107 6.26777 3.73223C5.79893 3.26339 5.16304 3 4.5 3C3.83696 3 3.20107 3.26339 2.73223 3.73223C2.26339 4.20107 2 4.83696 2 5.5C2 6.16304 2.26339 6.79893 2.73223 7.26777C3.20107 7.73661 3.83696 8 4.5 8V8Z">
                                </path>
                            </svg>
                            <span class="ms-2">الأدوار</span>
                        </a>
                    @endcan
                </li>
                @can('عرض الاعلانات')
                    <li>
                        <a class="m-link" href="{{ route('adds.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path d="M8 1v14m7-7H1" stroke="#000" stroke-width="2" />
                            </svg>

                            <span class="ms-2">الاعلانات</span>
                        </a>
                    </li>
                @endcan
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Account" href="#">
                        <svg class="bi bi-hamburger" width="1em" height="1em" viewBox="0 0 16 16"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1 0h14a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1zM0 8h16a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H0a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1zm1 5h14a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1z" />
                        </svg>
                        <span class="ms-2">بيان العمل</span>
                        <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                    </a>

                    <ul class="sub-menu collapse" id="menu-Account">
                        @can('اضافة رابط')
                            <li><a class="ms-link" href="{{ route('works.create') }}">اضافه عمل جديد</a></li>
                        @endcan
                        @can('عرض الروابط')
                            <li><a class="ms-link" href="{{ route('facebook.links') }}"> روابط فيس بوك </a></li>
                        @endcan
                        @can('عرض الروابط')
                            <li><a class="ms-link" href="{{ route('youtube.links') }}"> روابط يوتيوب </a></li>
                        @endcan
                        @can('متابعة العمل')
                            <li><a class="ms-link" href="{{ route('works.review') }}"> متابعه العمل </a></li>
                        @endcan


                    </ul>
                </li>
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Applications" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                            <path class="fill-secondary" d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        </svg>

                        <span class="ms-2">الاشتراكات</span>
                        <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                    </a>
                    <ul class="sub-menu collapse" id="menu-Applications">
                        @can('مراجعة الاشتراكات')
                            <li>
                                <a class="ms-link text-warning" href="{{ route('subscriptions.index') }}">
                                    مراجعة الاشتراكات
                                    <span
                                        class="badge rounded-pill bg-warning float-right ml-2">{{ App\Models\Subscription::where('status', 'pending')->count() }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('الاشتراكات المفعلة')
                            <li>
                                <a class="ms-link text-success" href="{{ route('accepted.subscription') }}">
                                    الاشتراكات المفعلة
                                    <span
                                        class="badge rounded-pill bg-success float-right ml-2">{{ App\Models\Subscription::where('status', 'active')->count() }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('الاشتراكات الملغية')
                            <li>
                                <a class="ms-link text-danger" href="{{ route('cancelled.subscription') }}">
                                    الاشتراكات الملغيه
                                    <span
                                        class="badge rounded-pill bg-danger float-right ml-2">{{ App\Models\Subscription::where('status', 'cancelled')->count() }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                {{-- @can('viewWithdralls-admin') --}}
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_pages" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path class="fill-secondary" fill-rule="evenodd"
                                d="M8.646 5.646a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 8 8.646 6.354a.5.5 0 0 1 0-.708zm-1.292 0a.5.5 0 0 0-.708 0l-2 2a.5.5 0 0 0 0 .708l2 2a.5.5 0 0 0 .708-.708L5.707 8l1.647-1.646a.5.5 0 0 0 0-.708z" />
                            <path
                                d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                            <path
                                d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                        </svg>
                        <span class="ms-2">عمليات السحب</span>
                        <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                    </a>
                    <ul class="sub-menu collapse" id="menu_pages">
                        @can('ادارة عمليات السحب')
                            <li>
                                <a class="ms-link text-warning" href="{{ route('withdrawals.index') }}">
                                    ادارة عمليات السحب
                                    <span
                                        class="badge rounded-pill bg-warning float-right ml-2">{{ App\Models\Withdrawal::where('status', 'pending')->count() }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('العمليات المؤكدة')
                            <li>
                                <a class="ms-link text-success" href="{{ route('accepted.withdrawals') }}">
                                    العمليات المؤكدة
                                    <span
                                        class="badge rounded-pill bg-success float-right ml-2">{{ App\Models\Withdrawal::where('status', 'accept')->count() }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('العمليات المرفوضة')
                            <li>
                                <a class="ms-link text-danger" href="{{ route('rejected.withdrawals') }}">
                                    العمليات المرفوضة
                                    <span
                                        class="badge rounded-pill bg-danger float-right ml-2">{{ App\Models\Withdrawal::where('status', 'rejected')->count() }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>

                </li>
                <a class="m-link" href="{{ route('copied.index') }}">

                    <span class="ms-2">روابط الدعوة</span>
                </a>
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_ws" href="#">
                        <svg width="18" viewBox="0 0 16 16" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.97188 0C3.58125 0 0 3.58125 0 8C0 12.4187 3.58125 16 8 16C12.4188 16 15.9719 12.4187 15.9719 8.02812C15.9719 3.6375 12.4188 0 7.97188 0ZM13.0188 11.2781L10.35 11.2376L9.56406 13.7873C9.06563 13.9219 8.54375 14 8 14C7.45625 14 6.93469 13.9212 6.43469 13.7857L5.65 11.2375L2.98125 11.278C2.415 10.4137 2.07031 9.39459 2.01625 8.29959L4.19687 6.7625L3.33125 4.2375C3.9925 3.41844 4.86531 2.78094 5.86438 2.39875L8 4L10.1341 2.39937C11.1334 2.78156 12.0059 3.41937 12.6672 4.23812L11.8031 6.7625L13.9838 8.29688C13.9313 9.39375 13.5875 10.4125 13.0188 11.2781Z" />
                            <path class="fill-secondary"
                                d="M6.49692 9.99999L5.53442 7.14374L8.00005 5.37811L10.4382 7.14436L9.51255 9.99999H6.49692Z" />
                        </svg>
                        <span class="ms-2"> طريقة عمل الموقع</span>
                        <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                    </a>
                    <ul class="sub-menu collapse" id="menu_ws">
                        @can('رفع فيديو')
                        <li><a class="ms-link" href="{{ route('dashboard.uploadForm') }}">رفع فيديو </a></li>
                        @endcan
                        @can('كل الفيديوهات')
                        <li><a class="ms-link" href="{{ route('promotionalVideo.index') }}">كل الفيديوهات</a></li>
                        @endcan
                    </ul>
                </li>

                {{-- @endcan --}}
                @can('عرض الاعدادات')
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_employees" href="#">
                            <svg width="18" viewBox="0 0 16 16" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.97188 0C3.58125 0 0 3.58125 0 8C0 12.4187 3.58125 16 8 16C12.4188 16 15.9719 12.4187 15.9719 8.02812C15.9719 3.6375 12.4188 0 7.97188 0ZM13.0188 11.2781L10.35 11.2376L9.56406 13.7873C9.06563 13.9219 8.54375 14 8 14C7.45625 14 6.93469 13.9212 6.43469 13.7857L5.65 11.2375L2.98125 11.278C2.415 10.4137 2.07031 9.39459 2.01625 8.29959L4.19687 6.7625L3.33125 4.2375C3.9925 3.41844 4.86531 2.78094 5.86438 2.39875L8 4L10.1341 2.39937C11.1334 2.78156 12.0059 3.41937 12.6672 4.23812L11.8031 6.7625L13.9838 8.29688C13.9313 9.39375 13.5875 10.4125 13.0188 11.2781Z" />
                                <path class="fill-secondary"
                                    d="M6.49692 9.99999L5.53442 7.14374L8.00005 5.37811L10.4382 7.14436L9.51255 9.99999H6.49692Z" />
                            </svg>
                            <span class="ms-2"> الاعدادات العامه</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>

                        <ul class="sub-menu collapse" id="menu_employees">
                            <li><a class="ms-link" href="{{ route('settings.index') }}">اعدادات وسائل التواصل </a></li>
                            @can('عرض السلايدر')
                                <li><a class="ms-link" href="{{ route('sliders.index') }}">اعدادات الاسليدر</a></li>
                            @endcan
                            @can('عرض السوشيال')
                                <li><a class="ms-link" href="{{ route('socials.index') }}">اعدادات روابط السوشيال ميديا</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <a class="m-link" href="{{ route('website.welcome') }}">
                    <span class="ms-2">زياره الموقع</span>
                </a>
                </li>
        </div>
    </div>
</div>
