<x-app-layout>
    <div class="filters flex space-x-6">
        <div class="w-1/4">
            <select name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Category One">Category One</option>
                <option value="Category Two">Category Two</option>
                <option value="Category Three">Category Three</option>
                <option value="Category Four">Category Four</option>
            </select>
        </div>
        <div class="div w-1/4">
            <select name="other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Filter One">Filter One</option>
                <option value="Filter Two">Filter Two</option>
                <option value="Filter Three">Filter Three</option>
                <option value="Filter Four">Filter Four</option>
            </select>
        </div>
        <div class="div w-2/4 relative">
            <input type="search" placeholder="Find an idea" class="w-full rounded-xl bg-white px-4 py-2 pl-8 border-none">
            <div class="absolute top-0 flex h-full ml-2 placeholder-gray-900">
                <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
        </div>
    </div>
    <!-- end filters -->

    <div class="ideas-container space-y-6 my-6 flex flex-col">
        <div class="idea-container bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">
                        12
                    </div>
                    <div class="text-gray-500">
                        Votes
                    </div>
                    <div class="mt-8">
                        <button class="w-20 px-4 py-3 bg-gray-200 font-bold text-xxs uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                            Vote
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">
                            A random title can go here
                        </a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe possimus accusantium consequatur vitae architecto. Minus eaque labore similique, explicabo, amet eligendi, nobis deserunt saepe quod itaque provident ex aliquam quasi iste. Voluptate, eum ullam? Aspernatur, harum cumque assumenda soluta ab sint omnis fugiat perspiciatis libero beatae sit ea nostrum? At labore commodi sunt praesentium culpa, neque facere quibusdam harum soluta est illo possimus! Explicabo, nesciunt debitis quisquam recusandae voluptas soluta iure unde. Perspiciatis saepe, minima inventore debitis praesentium mollitia in fuga. Minus saepe quod, sequi molestias amet libero laudantium, porro veritatis numquam obcaecati harum? Atque sint possimus ad explicabo voluptates?
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold text-gray-400 space-x-2">
                            <div>
                                10 hours ago
                            </div>
                            <div>
                                &bull;
                            </div>
                            <div>
                                Category 1
                            </div>
                            <div>
                                &bull;
                            </div>
                            <div class="text-gray-900">                            
                                3 Comments
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2">
                                Open
                            </div>
                            <button class="relative px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                </svg>
                                <ul class="absolute w-44 text-left ml-8 py-3 font-semi-bold bg-white shadow-dialog rounded-xl">
                                    <li>
                                        <a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">
                                            Mark as Spam
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">
                                            Delete post
                                        </a>
                                    </li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>            
        </div> <!-- end idea container -->        

        <div class="idea-container bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl text-blue">
                        66
                    </div>
                    <div class="text-gray-500">
                        Votes
                    </div>
                    <div class="mt-8">
                        <button class="w-20 px-4 py-3 bg-blue text-white font-bold text-xxs uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                            Vote
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">
                            Another random title can go here
                        </a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe possimus accusantium consequatur vitae architecto. Minus eaque labore similique, explicabo, amet eligendi, nobis deserunt saepe quod itaque provident ex aliquam quasi iste. Voluptate, eum ullam? Aspernatur, harum cumque assumenda soluta ab sint omnis fugiat perspiciatis libero beatae sit ea nostrum? At labore commodi sunt praesentium culpa, neque facere quibusdam harum soluta est illo possimus! Explicabo, nesciunt debitis quisquam recusandae voluptas soluta iure unde. Perspiciatis saepe, minima inventore debitis praesentium mollitia in fuga. Minus saepe quod, sequi molestias amet libero laudantium, porro veritatis numquam obcaecati harum? Atque sint possimus ad explicabo voluptates?
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold text-gray-400 space-x-2">
                            <div>
                                22 hours ago
                            </div>
                            <div>
                                &bull;
                            </div>
                            <div>
                                Category 1
                            </div>
                            <div>
                                &bull;
                            </div>
                            <div class="text-gray-900">                            
                                6 Comments
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-yellow text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2">
                                In progress
                            </div>
                            <button class="relative px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>            
        </div> <!-- end idea container -->     

        <div class="ideas-container space-y-6 my-6 flex flex-col">
        <div class="idea-container bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">
                        32
                    </div>
                    <div class="text-gray-500">
                        Votes
                    </div>
                    <div class="mt-8">
                        <button class="w-20 px-4 py-3 bg-gray-200 font-bold text-xxs uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                            Vote
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&3" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">
                            Yet another random title can go here
                        </a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe possimus accusantium consequatur vitae architecto. Minus eaque labore similique, explicabo, amet eligendi, nobis deserunt saepe quod itaque provident ex aliquam quasi iste. Voluptate, eum ullam? Aspernatur, harum cumque assumenda soluta ab sint omnis fugiat perspiciatis libero beatae sit ea nostrum? At labore commodi sunt praesentium culpa, neque facere quibusdam harum soluta est illo possimus! Explicabo, nesciunt debitis quisquam recusandae voluptas soluta iure unde. Perspiciatis saepe, minima inventore debitis praesentium mollitia in fuga. Minus saepe quod, sequi molestias amet libero laudantium, porro veritatis numquam obcaecati harum? Atque sint possimus ad explicabo voluptates?
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold text-gray-400 space-x-2">
                            <div>
                                10 hours ago
                            </div>
                            <div>
                                &bull;
                            </div>
                            <div>
                                Category 1
                            </div>
                            <div>
                                &bull;
                            </div>
                            <div class="text-gray-900">                            
                                3 Comments
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-red text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2">
                                Close
                            </div>
                            <button class="relative px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>            
        </div> <!-- end idea container -->     

        <div class="ideas-container space-y-6 my-6 flex flex-col">
        <div class="idea-container bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">
                        22
                    </div>
                    <div class="text-gray-500">
                        Votes
                    </div>
                    <div class="mt-8">
                        <button class="w-20 px-4 py-3 bg-gray-200 font-bold text-xxs uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                            Vote
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">
                            One more random title can go here
                        </a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe possimus accusantium consequatur vitae architecto. Minus eaque labore similique, explicabo, amet eligendi, nobis deserunt saepe quod itaque provident ex aliquam quasi iste. Voluptate, eum ullam? Aspernatur, harum cumque assumenda soluta ab sint omnis fugiat perspiciatis libero beatae sit ea nostrum? At labore commodi sunt praesentium culpa, neque facere quibusdam harum soluta est illo possimus! Explicabo, nesciunt debitis quisquam recusandae voluptas soluta iure unde. Perspiciatis saepe, minima inventore debitis praesentium mollitia in fuga. Minus saepe quod, sequi molestias amet libero laudantium, porro veritatis numquam obcaecati harum? Atque sint possimus ad explicabo voluptates?
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold text-gray-400 space-x-2">
                            <div>
                                10 hours ago
                            </div>
                            <div>
                                &bull;
                            </div>
                            <div>
                                Category 1
                            </div>
                            <div>
                                &bull;
                            </div>
                            <div class="text-gray-900">                            
                                3 Comments
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-green text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2">
                                Implemented
                            </div>
                            <button class="relative px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>            
        </div> <!-- end idea container -->     

        <div class="ideas-container space-y-6 my-6 flex flex-col">
        <div class="idea-container bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">
                        2
                    </div>
                    <div class="text-gray-500">
                        Votes
                    </div>
                    <div class="mt-8">
                        <button class="w-20 px-4 py-3 bg-gray-200 font-bold text-xxs uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                            Vote
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=5" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">
                            Last random title can go here
                        </a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe possimus accusantium consequatur vitae architecto. Minus eaque labore similique, explicabo, amet eligendi, nobis deserunt saepe quod itaque provident ex aliquam quasi iste. Voluptate, eum ullam? Aspernatur, harum cumque assumenda soluta ab sint omnis fugiat perspiciatis libero beatae sit ea nostrum? At labore commodi sunt praesentium culpa, neque facere quibusdam harum soluta est illo possimus! Explicabo, nesciunt debitis quisquam recusandae voluptas soluta iure unde. Perspiciatis saepe, minima inventore debitis praesentium mollitia in fuga. Minus saepe quod, sequi molestias amet libero laudantium, porro veritatis numquam obcaecati harum? Atque sint possimus ad explicabo voluptates?
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold text-gray-400 space-x-2">
                            <div>
                                10 hours ago
                            </div>
                            <div>
                                &bull;
                            </div>
                            <div>
                                Category 1
                            </div>
                            <div>
                                &bull;
                            </div>
                            <div class="text-gray-900">                            
                                3 Comments
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-purple text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2">
                                Considering
                            </div>
                            <button class="relative px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>            
        </div> <!-- end idea container -->     
    </div>
    <!-- end ideas container -->
</x-app-layout>
