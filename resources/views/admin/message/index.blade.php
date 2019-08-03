@extends('layouts.admin')

@section('content')
    <div id="chat-conversation">

        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Chats</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item">Apps</li>
                    <li class="breadcrumb-item active">Chats</li>
                </ol>
            </div>
            <div class="">
                <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10">
                    <i class="ti-settings text-white"></i></button>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-0">
                    <!-- .chat-row -->
                    <div class="chat-main-box">
                        <!-- .chat-left-panel -->
                        <div class="chat-left-aside">
                            <div class="open-panel"><i class="ti-angle-right"></i></div>
                            <div class="chat-left-inner">
                                <div class="form-material">
                                    <input class="form-control p-20" type="text" placeholder="Search Contact">
                                </div>
                                <ul class="chatonline style-none">
                                    <li class="list-item" v-for="conversation in conversations">
                                        <a href="javascript:void(0)" @click="getMessages(conversation.id)">
                                            <img :src="conversation.user.photo ? 'http://localhost/kanon/public/images/'+conversation.user.photo.path : 'http://localhost/kanon/public/images/avatar.png'"
                                                 alt="user-img" class="img-circle">
                                            <span>
                                                    @{{ conversation.user.name }}
                                                    <small class="text-success">online</small></span>
                                        </a>
                                    </li>
                                    <li class="p-20"></li>

                                </ul>

                            </div>
                        </div>

                        <!-- .chat-left-panel -->
                        <!-- .chat-right-panel -->
                        <div class="chat-right-aside">
                            <div class="chat-main-header">
                                <div class="p-20 b-b">
                                    <h3 class="box-title">Chat Message</h3>
                                </div>
                            </div>
                            <ul class="chat-list p-20" v-if="Object.keys(messages).length > 0">
                                {{--<li v-if="messages">--}}
                                <li v-for="message in messages">
                                <li v-if="message.user_id == admin.id">
                                    <div class="chat-img"><img
                                                :src="message.user.photo ? 'http://localhost/kanon/public/images/'+message.user.photo.path : 'http://localhost/kanon/public/images/avatar.png'"
                                                alt="user"/>
                                    </div>
                                    <div class="chat-content">
                                        <h5>@{{ message.user.name }}</h5>
                                        <div class="box bg-light-info">
                                            @{{ message.content }}
                                        </div>
                                    </div>
                                    <div class="chat-time">@{{ message.created_at }}</div>
                                </li>

                                <li v-else class="reverse">
                                    <div class="chat-content">
                                        <h5>@{{ message.user.name }}</h5>
                                        <div class="box bg-light-inverse">@{{ message.content }}</div>
                                    </div>
                                    <div class="chat-img"><img
                                                :src="message.user.photo ? 'http://localhost/kanon/public/images/'+message.user.photo.path : 'http://localhost/kanon/public/images/avatar.png'"
                                                alt="user"/>
                                    </div>
                                    <div class="chat-time">@{{ message.created_at }}</div>
                                </li>

                                </li>

                            </ul>
                        </div>

                        <form method="POST" action="{{route('message.store')}}">
                            @csrf
                            <div class="card-body b-t">
                                <div class="row">
                                    <div class="col-8">
                                        <textarea name="content" placeholder="Type your message here"
                                                  class="form-control b-0"></textarea>
                                    </div>
                                    <div class="col-4 text-right">
                                        <button type="submit" class="btn btn-info btn-circle btn-lg"><i
                                                    class="fas fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- .chat-right-panel -->
                </div>
                <!-- /.chat-row -->
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->


@endsection
@section('scripts')
    <script>
     var chat = new Vue({
            el: '#chat-conversation',
            data: {
                conversations: {},
                messages: {},
                user: {},
                admin: {!! Auth::user()->toJson() !!},
                body: '',
            },
            mounted() {
                this.getConversations();
            },
            methods: {
                getConversations() {
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('api.admin.conversations.index') }}',
                        data: '_token = {{ csrf_token() }}',
                    }).then((response) => {
                        this.conversations = response.data
                    });
                },
                getMessages(id) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('api.admin.messages.index') }}',
                        data: {_token: '{{ csrf_token() }}', id: id},
                    }).then((response) => {
                        chat.messages = response.data;
                    })
                },


            }
        });

    </script>
@stop

