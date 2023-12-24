<html>

<head>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    Saira: ["Saira Condensed", "sans-serif"],
                },
                extend: {
                    colors: {
                        text: "#0F0F0F ",
                        background: "#FFFFFF",
                        primary: "#155831",
                        secondary: "#D7E4DC",
                        accent: "#C20002",
                        primary2: "#3E5815",
                        hoverd: "#FF4F4D",
                    },
                },
            },
        };
    </script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
</head>

<body class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1">
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
            <div class="flex flex-row gap-1 items-center justify-center ml-2 ">


                <h2 class="ms-3 font-extrabold text-dark font-semibold text-2xl">Data</h2>
                <img src="<?= BASE_URL_ASSETS ?>img/brand.png" alt=brand />
                <h2 class="ms-3 font-extrabold text-dark font-semibold text-2xl">are </h2>
            </div>
            <div class="mt-12 flex flex-col items-center">

                <div class=" w-full flex-1 mt-8">


                    <div class="my-12 border-b text-center">
                        <div class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                            Log in up with e-mail
                        </div>
                    </div>
                    <form action="<?= BASE_URL ?>/user/Userlogin" method="post">
                        <div class="mx-auto max-w-xs">
                            <input class="w-full px-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" name="email" type="email" placeholder="Email" />
                            <input class="w-full px-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5" name="password" type="password" placeholder="Password" />
                            <button class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none" name="submit" type="submit">
                                <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                    <circle cx="8.5" cy="7" r="4" />
                                    <path d="M20 8v6M23 11h-6" />
                                </svg>
                                <span class="ml-3">
                                    Log In
                                </span>
                            </button>
                            <p class="text-red-500 text-center mb-2 mt-3">
                                <?= $this->view_data["error"]; ?>
                            </p>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
            <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat" style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');">
            </div>
        </div>
    </div>

</body>

</html>