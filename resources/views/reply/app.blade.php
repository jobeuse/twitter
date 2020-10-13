<div class="row">
    <div class="col-lg-12  rounded-lg p-2">
        <div class="d-flex flex-row">
            <div class="">
                <a href="{{ route('profile',$user->username ) }}">
                    <img src='https://avataaars.io/?avatarStyle=Circle&topType=LongHairStraight&accessoriesType=Blank&hairColor=BrownDark&facialHairType=Blank&clotheType=BlazerShirt&eyeType=Default&eyebrowType=Default&mouthType=Default&skinColor=Light' alt="imagefrined" class="rounded-full mr-3" width="40px" >
                </a>
            </div>
            <div class="p-1 text-truncate">
                <a class="font-weight-bold text-decoration-none text-dark mb-3 text-truncate">
                    {{ $user->name }}
                </a>

            </div>
            <div class="p-1 text-truncate">
                <a href="{{ route('profile',$user->username ) }}" class="text-muted">
                    {{ '@' }}{{ $user->username }}
                </a>
            </div>

            <div class="p-1 text-truncate">
            {{ $tweetcomment->created_at->diffForHumans() }}

            </div>
        </div>

        <div class="d-flex flex-column border-left mt-2 ml-4 text-break ">
            <div class="pl-3">
                @if ($tweetcomment->comment != null)
                    <a href="{{ $tweet->id }}/{{$tweet->user->username}}/tweets" class="text-decoration-none text-dark">
                        <p>
                            {!!  Str::limit($tweetcomment->comment, 500) !!}
                        </p>
                    </a>
                @endif
                @if($tweetcomment->image != null)
                    <a href="#" class="text-decoration-none text-muted">
                        {{$tweetcomment->image}}
                    </a>

                @endif
                @if($tweetcomment->gif != null)
                    <a href="#" class="text-decoration-none text-muted">
                        {{$tweetcomment->gif}}
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-12 m-2 pl-5">
        <span class="text-muted">Replying to</span><a href="{{ route('profile',$user->username ) }}" class="text-primary">
            {{ '@' }}{{ $user->username }}
        </a>
    </div>

    <div class="col-lg-12 mt-2">
        <div class="d-flex flex-row">
            <div class="">
                <a href="{{ route('profile',auth()->user()->username) }}">
                    <img src='https://avataaars.io/?avatarStyle=Circle&topType=LongHairStraight&accessoriesType=Blank&hairColor=BrownDark&facialHairType=Blank&clotheType=BlazerShirt&eyeType=Default&eyebrowType=Default&mouthType=Default&skinColor=Light' alt="imagefrined" class="rounded-full mr-3" width="40px" >
                </a>
            </div>
            <div class="flex-grow-1 text-truncate font-weight-bold">
                <form method="POST" action="/tweets/{{$tweet->id}}/reply" enctype="multipart/form-data">
                    @csrf
                    <input type="text" value="{{$tweet->id}}" name="tweet_id" hidden>

                    <input type="text" value="{{$tweetcomment->id}}" name="comment_id" hidden>

                    <textarea class="form-control border-0"  placeholder="Tweet your reply" name="reply" autofocus></textarea>

                    <hr class="my-4">
                    <footer class="d-flex flex-row sendtweetssection">
                        <div class="flex-grow-1 ">
                            <div class="d-flex flex-row">
                                <div class="pr-2 pt-2">
                                    <div class="upload">
                                        <label for="file-input">
                                            <span class="">
                                                <svg viewBox="0 0 24 24" class="publishicon" width="30px">
                                                    <g><path d="M19.75 2H4.25C3.01 2 2 3.01 2 4.25v15.5C2 20.99 3.01 22 4.25 22h15.5c1.24 0 2.25-1.01 2.25-2.25V4.25C22 3.01 20.99 2 19.75 2zM4.25 3.5h15.5c.413 0 .75.337.75.75v9.676l-3.858-3.858c-.14-.14-.33-.22-.53-.22h-.003c-.2 0-.393.08-.532.224l-4.317 4.384-1.813-1.806c-.14-.14-.33-.22-.53-.22-.193-.03-.395.08-.535.227L3.5 17.642V4.25c0-.413.337-.75.75-.75zm-.744 16.28l5.418-5.534 6.282 6.254H4.25c-.402 0-.727-.322-.744-.72zm16.244.72h-2.42l-5.007-4.987 3.792-3.85 4.385 4.384v3.703c0 .413-.337.75-.75.75z">
                                                    </path>
                                                    <circle cx="8.868" cy="8.309" r="1.542">
                                                        </circle>
                                                    </g>
                                                </svg>
                                            </span>
                                        </label>
                                        <input id="file-input" type="file" name="image" />

                                    </div>

                                </div>
                                <div class="p-2">
                                    <svg viewBox="0 0 24 24" class="publishicon" width="30px">
                                        <g>
                                        <path d="M19 10.5V8.8h-4.4v6.4h1.7v-2h2v-1.7h-2v-1H19zm-7.3-1.7h1.7v6.4h-1.7V8.8zm-3.6 1.6c.4 0 .9.2 1.2.5l1.2-1C9.9 9.2 9 8.8 8.1 8.8c-1.8 0-3.2 1.4-3.2 3.2s1.4 3.2 3.2 3.2c1 0 1.8-.4 2.4-1.1v-2.5H7.7v1.2h1.2v.6c-.2.1-.5.2-.8.2-.9 0-1.6-.7-1.6-1.6 0-.8.7-1.6 1.6-1.6z"></path><path d="M20.5 2.02h-17c-1.24 0-2.25 1.007-2.25 2.247v15.507c0 1.238 1.01 2.246 2.25 2.246h17c1.24 0 2.25-1.008 2.25-2.246V4.267c0-1.24-1.01-2.247-2.25-2.247zm.75 17.754c0 .41-.336.746-.75.746h-17c-.414 0-.75-.336-.75-.746V4.267c0-.412.336-.747.75-.747h17c.414 0 .75.335.75.747v15.507z">
                                        </path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="p-2">

                                </div>
                            </div>
                        </div>

                        <div class="">
                            <button class="btn btn-sm shadow-sm py-2 px-2 text-white float-right font-weight-bold" type="submit">Reply</button>

                        </div>

                    </footer>
                </form>
            </div>
        </div>
            @error('body')
            <span class="text-danger text-sm ml-10">{{ $message }}</span>

            @enderror
    </div>
</div>
