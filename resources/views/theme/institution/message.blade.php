@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Message</h2>

    </div>
    @include('frontend.notification')

    <div class="right-content">
                    <div class="groups-grid padding_0">

                        <div class="grid-header">
                            <div class="header-inner">
                                <h2>Message Inbox(Student)</h2>

                                <div class="header-actions">

                                    <div class="buttons">

                                    </div>

                                </div>

                            </div>




                        </div>
                    </div>


                    <div  class="content-section is-active">

                         <div class="columns">
                             <div class="column is-4">
                                <div class="message-left-side">
                                     <div class="field">
                                        <label>Search Student</label>
                                        <div class="control has-icon">
                                            <input type="text" class="input" id="student_search_text">
                                            <input type="hidden" value="{{$user_ids}}" name="user_ids">
                                            <input type="hidden" value="{{$user_id}}" name="user_id">
                                            <div class="form-icon">
                                                <i data-feather="search"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dashboard-box">
                                        <div class="box-content">
                                            <div class="box-subscribers" id="box-subscribers">
                                              ...
                                            </div>


                                        </div>
                                    </div>


                                </div>
                             </div>
                             <div class="column is-8">
                                <div class="dashboard-box" style="padding:0px;">
                                    <div class="box-content">
                                        <div class="box-subscribers" style="padding-left:30px;">
                                            <div class="box-subscriber" >
                                                <div id="student_avatar">

                                                </div>
                                                <div class="subscriber-meta">
                                                    <span class="meta-title" id="student_name"></span>
                                                </div>
                                            </div>
                                        </div>

                                          <div id="chat-body" class="chat-body is-opened">
                                            <!-- Conversation with Dan -->
                                            <div id="dan-conversation" class="chat-body-inner has-slimscroll">

                                                <!--
                                                <div class="chat-message is-received">
                                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                                                    <div class="message-block">
                                                        <span>8:03am</span>
                                                        <div class="message-text">Hi Jenna! I made a new design, and i wanted to show it to you.</div>
                                                    </div>
                                                </div>

                                                <div class="chat-message is-received">
                                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                                                    <div class="message-block">
                                                        <span>8:03am</span>
                                                        <div class="message-text">It's quite clean and it's inspired from Bulkit.</div>
                                                    </div>
                                                </div>

                                                <div class="chat-message is-sent">
                                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                                                    <div class="message-block">
                                                        <span>8:12am</span>
                                                        <div class="message-text">Oh really??! I want to see that.</div>
                                                    </div>
                                                </div>

                                                <div class="chat-message is-received">
                                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                                                    <div class="message-block">
                                                        <span>8:13am</span>
                                                        <div class="message-text">FYI it was done in less than a day.</div>
                                                    </div>
                                                </div>

                                                <div class="chat-message is-sent">
                                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                                                    <div class="message-block">
                                                        <span>8:17am</span>
                                                        <div class="message-text">Great to hear it. Just send me the PSD files so i can have a look at it.</div>
                                                    </div>
                                                </div>

                                                <div class="chat-message is-sent">
                                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                                                    <div class="message-block">
                                                        <span>8:18am</span>
                                                        <div class="message-text">And if you have a prototype, you can also send me the link to it.</div>
                                                    </div>
                                                </div>
                                                <div class="chat-message is-received">
                                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                                                    <div class="message-block">
                                                        <span>8:03am</span>
                                                        <div class="message-text">It's quite clean and it's inspired from Bulkit.</div>
                                                    </div>
                                                </div>

                                                <div class="chat-message is-sent">
                                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                                                    <div class="message-block">
                                                        <span>8:12am</span>
                                                        <div class="message-text">Oh really??! I want to see that.</div>
                                                    </div>
                                                </div>

                                                <div class="chat-message is-received">
                                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                                                    <div class="message-block">
                                                        <span>8:13am</span>
                                                        <div class="message-text">FYI it was done in less than a day.</div>
                                                    </div>
                                                </div>

                                                <div class="chat-message is-sent">
                                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                                                    <div class="message-block">
                                                        <span>8:17am</span>
                                                        <div class="message-text">Great to hear it. Just send me the PSD files so i can have a look at it.</div>
                                                    </div>
                                                </div>

                                                <div class="chat-message is-sent">
                                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                                                    <div class="message-block">
                                                        <span>8:18am</span>
                                                        <div class="message-text">And if you have a prototype, you can also send me the link to it.</div>
                                                    </div>
                                                </div-->


                                            </div>


                                        </div>
                                          <div class="columns"  id="send_message" style="margin:10px;display: none;" />
                                             <div class="column is-8">
                                                <textarea id="send_message_text" class="textarea comment-textarea" rows="1"></textarea>
                                             </div>
                                             <div class="column is-3">
                                                <button id="send_message_button" class="button is-solid primary-button is-fullwidth raised" >
                                                    Send
                                                </button>


                                             </div>
                                              <div class="column is-1" style="padding-left: 5px;padding-right: 5px;">


                                                <div style="float: right; display: none;" id="loading_message_send"><img src="{{asset('frontend/images/loadingpleasewait.gif')}}" width="40"></div>
                                             </div>
                                         </div>




                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
    @endsection

