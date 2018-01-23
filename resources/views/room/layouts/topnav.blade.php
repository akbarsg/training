        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">{{ $user->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    @php
                    $newNotifCount = Auth::user()->notifications->where('notifiable_id', Auth::user()->id)->where('read_at', null)->count();
                    @endphp
                    <span class="badge bg-green">{{ $newNotifCount }}</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    @if($newNotifCount > 0)
                    <li>
                      <div class="text-center">
                        <a href="/room/notification/markread/all">
                          <strong>Mark All as Read</strong>
                        </a>
                      </div>
                    </li>
                    @endif
                    @foreach (Auth::user()->notifications as $notification)
                        
                        <li>
                          @if($notification->read_at == null)
                          <strong>
                          @endif
                          <a>
                            <!-- <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span> -->
                            <span>
                              <span>System</span>

                              <span class="time">{{ $notification->created_at->format('d-m-Y H:i') }}</span>
                            </span>
                            <span class="message">
                              {{ $notification->data["message"] }}                              
                            </span>
                          </a>
                          @if($notification->read_at == null)
                          </strong>
                          @endif
                        </li>
                    @endforeach
                    
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>

            </nav>
          </div>
        </div>