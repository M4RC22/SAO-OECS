@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-title fw-bold fs-3">
        Narrative Report
    </div>

      <div class="main-section shadow p-3 mb-5 bg-#fff rounded mt-3">
        <div class="mb-3 mt-1 py-1">
            <label for="eventdesc" class="form-label fw-bold">Event Description</label>
            <textarea class="form-control opacity-75 shadow-sm bg-body rounded" id="eventdesc" rows="6"></textarea>
        </div>

        <div class="mb-3 mt-1 py-1">
            <label for="eventprep" class="form-label fw-bold">Event Preparation</label>
            <textarea class="form-control opacity-75 shadow-sm bg-body rounded" id="eventprep" rows="6" ></textarea>
        </div>

        <div class="mb-5 mt-1 py-1">
            <label for="participants" class="form-label fw-bold">Participants</label>
            <textarea class="form-control opacity-75 shadow-sm bg-body rounded" id="participants" rows="6" ></textarea>
        </div>

        <div class="form-title fw-bold fs-4">
            Program
        </div>

        <div class="row mb-3 mt-5 py-1 d-flex justify-content-starts">
            <div class="col-sm-12 col-md-2 pb-3">
                <label for="startdate" class="form-label fw-bold">Start Date</label>
                <input type="date" class="form-control w-100" id="startdate" name="targetdate">
            </div>
            <div class="col-sm-12 col-md-2">
                <label for="enddate" class="form-label fw-bold">End Date</label>
                <input type="date" class="form-control w-100" id="enddate" name="targetdate">
            </div>
        </div>

        

            <div class="table-responsive-sm mb-5 mt-3">
                <table class="table table-striped table-hover">
           
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell p-4 fs-5">Time</th>
                            <th class="d-none d-sm-table-cell p-4 fs-5">Activity</th>
                    
                        </tr>
                    </thead>

                    
                    <tbody>
                        <tr>
                        <td class="p-4 d-block d-sm-table-cell">2:00 PM - 6:00 PM</td>
                        <td class="p-4 d-block d-sm-table-cell">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis veritatis pariatur placeat necessitatibus aliquid in sunt iste beatae tenetur ratione reiciendis recusandae deserunt, libero dolor eius atque natus ipsa accusamus obcaecati error ab. Illum, cumque voluptas at debitis dicta aliquam accusantium, voluptate sed necessitatibus distinctio, consequatur provident dignissimos sequi aspernatur minima autem quae cum ipsam ratione magni nobis voluptatem. Ea eos provident quae aut reprehenderit. Odit eius quos libero ut id voluptas laboriosam debitis magni voluptatum cum ea quo sit fugit et hic quia magnam, assumenda natus? Nam, enim! Dicta tenetur aperiam nemo deserunt fuga temporibus ducimus cumque laborum, quidem earum rem culpa accusantium ea ad? Inventore quos ratione exercitationem molestiae asperiores iusto possimus dignissimos officia, harum incidunt et, corporis nihil voluptas nostrum enim? Velit, voluptatem nemo molestias debitis iure officiis vero accusantium dolore sequi eaque, explicabo quaerat doloremque quasi aliquam beatae qui aspernatur facere suscipit aut aliquid a similique.</td>
                        <td class="p-4 d-block d-sm-table-cell"><a href="" class="text-decoration-none">Remove</a></td>
                        </tr>
                        <tr>
                        <td class="p-4 d-block d-sm-table-cell">1:00 PM - 3:00 PM</td>
                        <td class="p-4 d-block d-sm-table-cell">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt magnam veniam error dicta totam, repellat reiciendis iusto debitis voluptatem placeat, consequuntur ullam qui quo non perferendis tempore ut, incidunt mollitia excepturi laborum consequatur id et? Impedit id reprehenderit, in aut voluptatum unde accusantium nobis voluptates sunt vitae porro dolore sed distinctio iure quasi molestias totam, commodi voluptatibus maiores. Amet voluptatem deserunt excepturi similique, ipsa sed soluta iure quas sapiente, pariatur ratione asperiores accusantium aspernatur doloremque, quasi dignissimos iusto atque nesciunt eligendi. Rerum ipsum incidunt numquam aliquam qui quia obcaecati atque ex et quae. Minima deserunt quia necessitatibus, saepe voluptatem mollitia id distinctio incidunt dolorum obcaecati atque laborum delectus possimus quibusdam, sed tempora nisi, omnis est voluptates earum rerum doloremque error. Eos ab est cum fugit, ex doloremque vero commodi ut iste ea, nobis quod doloribus quos assumenda magni voluptas incidunt voluptates? Mollitia dolorum, doloribus dicta in reprehenderit voluptatum minima vel.</td>
                        <td class="p-4 d-block d-sm-table-cell"><a href="" class="text-decoration-none">Remove</a></td>
                        </tr>
                        <tr>
                        <td class="p-4 d-block d-sm-table-cell">3:00 PM - 5:00 PM</td>
                        <td class="p-4 d-block d-sm-table-cell">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt magnam veniam error dicta totam, repellat reiciendis iusto debitis voluptatem placeat, consequuntur ullam qui quo non perferendis tempore ut, incidunt mollitia excepturi laborum consequatur id et? Impedit id reprehenderit, in aut voluptatum unde accusantium nobis voluptates sunt vitae porro dolore sed distinctio iure quasi molestias totam, commodi voluptatibus maiores. Amet voluptatem deserunt excepturi similique, ipsa sed soluta iure quas sapiente, pariatur ratione asperiores accusantium aspernatur doloremque, quasi dignissimos iusto atque nesciunt eligendi. Rerum ipsum incidunt numquam aliquam qui quia obcaecati atque ex et quae. Minima deserunt quia necessitatibus, saepe voluptatem mollitia id distinctio incidunt dolorum obcaecati atque laborum delectus possimus quibusdam, sed tempora nisi, omnis est voluptates earum rerum doloremque error. Eos ab est cum fugit, ex doloremque vero commodi ut iste ea, nobis quod doloribus quos assumenda magni voluptas incidunt voluptates? Mollitia dolorum, doloribus dicta in reprehenderit voluptatum minima vel.</td>
                        <td class="p-4 d-block d-sm-table-cell"><a href="" class="text-decoration-none">Remove</a></td>
                        </tr>
                        <tr>
                        <td class="p-4 d-block d-sm-table-cell">4:00 PM - 7:00 PM</td>
                        <td class="p-4 d-block d-sm-table-cell">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt magnam veniam error dicta totam, repellat reiciendis iusto debitis voluptatem placeat, consequuntur ullam qui quo non perferendis tempore ut, incidunt mollitia excepturi laborum consequatur id et? Impedit id reprehenderit, in aut voluptatum unde accusantium nobis voluptates sunt vitae porro dolore sed distinctio iure quasi molestias totam, commodi voluptatibus maiores. Amet voluptatem deserunt excepturi similique, ipsa sed soluta iure quas sapiente, pariatur ratione asperiores accusantium aspernatur doloremque, quasi dignissimos iusto atque nesciunt eligendi. Rerum ipsum incidunt numquam aliquam qui quia obcaecati atque ex et quae. Minima deserunt quia necessitatibus, saepe voluptatem mollitia id distinctio incidunt dolorum obcaecati atque laborum delectus possimus quibusdam, sed tempora nisi, omnis est voluptates earum rerum doloremque error. Eos ab est cum fugit, ex doloremque vero commodi ut iste ea, nobis quod doloribus quos assumenda magni voluptas incidunt voluptates? Mollitia dolorum, doloribus dicta in reprehenderit voluptatum minima vel.</td>
                        <td class="p-4 d-block d-sm-table-cell"><a href="" class="text-decoration-none">Remove</a></td>
                        </tr>
                        <tr>
                        <td class="p-4 d-block d-sm-table-cell">5:00 PM - 7:00 PM</td>
                        <td class="p-4 d-block d-sm-table-cell">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt magnam veniam error dicta totam, repellat reiciendis iusto debitis voluptatem placeat, consequuntur ullam qui quo non perferendis tempore ut, incidunt mollitia excepturi laborum consequatur id et? Impedit id reprehenderit, in aut voluptatum unde accusantium nobis voluptates sunt vitae porro dolore sed distinctio iure quasi molestias totam, commodi voluptatibus maiores. Amet voluptatem deserunt excepturi similique, ipsa sed soluta iure quas sapiente, pariatur ratione asperiores accusantium aspernatur doloremque, quasi dignissimos iusto atque nesciunt eligendi. Rerum ipsum incidunt numquam aliquam qui quia obcaecati atque ex et quae. Minima deserunt quia necessitatibus, saepe voluptatem mollitia id distinctio incidunt dolorum obcaecati atque laborum delectus possimus quibusdam, sed tempora nisi, omnis est voluptates earum rerum doloremque error. Eos ab est cum fugit, ex doloremque vero commodi ut iste ea, nobis quod doloribus quos assumenda magni voluptas incidunt voluptates? Mollitia dolorum, doloribus dicta in reprehenderit voluptatum minima vel.</td>
                        <td class="p-4 d-block d-sm-table-cell"><a href="" class="text-decoration-none">Remove</a></td>
                        </tr>
                        <tr>
                        <td class="p-4 d-block d-sm-table-cell">6:00 PM - 8:00 PM</td>
                        <td class="p-4 d-block d-sm-table-cell">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt magnam veniam error dicta totam, repellat reiciendis iusto debitis voluptatem placeat, consequuntur ullam qui quo non perferendis tempore ut, incidunt mollitia excepturi laborum consequatur id et? Impedit id reprehenderit, in aut voluptatum unde accusantium nobis voluptates sunt vitae porro dolore sed distinctio iure quasi molestias totam, commodi voluptatibus maiores. Amet voluptatem deserunt excepturi similique, ipsa sed soluta iure quas sapiente, pariatur ratione asperiores accusantium aspernatur doloremque, quasi dignissimos iusto atque nesciunt eligendi. Rerum ipsum incidunt numquam aliquam qui quia obcaecati atque ex et quae. Minima deserunt quia necessitatibus, saepe voluptatem mollitia id distinctio incidunt dolorum obcaecati atque laborum delectus possimus quibusdam, sed tempora nisi, omnis est voluptates earum rerum doloremque error. Eos ab est cum fugit, ex doloremque vero commodi ut iste ea, nobis quod doloribus quos assumenda magni voluptas incidunt voluptates? Mollitia dolorum, doloribus dicta in reprehenderit voluptatum minima vel.</td>
                        <td class="p-4 d-block d-sm-table-cell"><a href="" class="text-decoration-none">Remove</a></td>
                        </tr>
                    
                    </tbody>   
                </table>
            </div>
   

        <a href="#" class="btn btn-success mt-2" type="submit">Add</a>

        <div class="form-title mt-5 fw-bold fs-4">
            Official Poster
        </div>

        <div class="mb-5 mt-2 py-1">
            <label for="officialposter" class="form-label fst-italic fw-lighter opacity-75">Upload a photo. (.jpg .png)</label>
            <input class="form-control form-control-sm w-25" id="officialposter" type="file"/>
        </div>

        <div class="row">
            <div class="col-4 pb-3">
                <img src="/img/post1.jpg" class="w-100">
            </div>
            <div class="col-4 pb-3">
                <img src="/img/post2.png" class="w-100">
            </div>
            <div class="col-4 pb-3">
                <img src="/img/post3.jpg" class="w-100">
            </div>
            <div class="col-4 pb-3">
                <img src="/img/post1.jpg" class="w-100">
            </div>
            <div class="col-4 pb-3">
                <img src="/img/post2.png" class="w-100">
            </div>
            <div class="col-4 pb-3">
                <img src="/img/post3.jpg" class="w-100">
            </div>
            
        </div>
        

        <div class="form-title fw-bold fs-4">
            Photos
        </div>

        <div class="mb-5 mt-2 py-1">
            <label for="photos" class="form-label fst-italic fw-lighter opacity-75">Upload a photo. (.jpg .png)</label>
            <input class="form-control form-control-sm w-25" id="photos" type="file"/>
        </div>

        <div class="row">
            <div class="row">
                <div class="col-4 pb-3">
                    <img src="/img/post1.jpg" class="w-100">
                </div>
                <div class="col-4 pb-3">
                    <img src="/img/post2.png" class="w-100">
                </div>
                <div class="col-4 pb-3">
                    <img src="/img/post3.jpg" class="w-100">
                </div>
                <div class="col-4 pb-3">
                    <img src="/img/post1.jpg" class="w-100">
                </div>
                <div class="col-4 pb-3">
                    <img src="/img/post2.png" class="w-100">
                </div>
                <div class="col-4 pb-3">
                    <img src="/img/post3.jpg" class="w-100">
                </div>
            </div>
        
        </div>

        <a href="#" class="btn btn-primary mt-5" type="submit">Submit</a>



      </div>
</div>
@endsection