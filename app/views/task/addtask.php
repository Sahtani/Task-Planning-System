<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.tailwindcss.com" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
  <!-- Code on GiHub: https://github.com/vitalikda/form-floating-labels-tailwindcss -->
  <style>
    .-z-1 {
      z-index: -1;
    }

    .origin-0 {
      transform-origin: 0%;
    }

    input:focus~label,
    input:not(:placeholder-shown)~label,
    textarea:focus~label,
    textarea:not(:placeholder-shown)~label,
    select:focus~label,
    select:not([value='']):valid~label {
      /* @apply transform; scale-75; -translate-y-6; */
      --tw-translate-x: 0;
      --tw-translate-y: 0;
      --tw-rotate: 0;
      --tw-skew-x: 0;
      --tw-skew-y: 0;
      transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
      --tw-scale-x: 0.75;
      --tw-scale-y: 0.75;
      --tw-translate-y: -1.5rem;
    }

    input:focus~label,
    select:focus~label {
      /* @apply text-black; left-0; */
      --tw-text-opacity: 1;
      color: rgba(0, 0, 0, var(--tw-text-opacity));
      left: 0px;
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
            primary3: "#155831",
            secondary: "#D7E4DC",
            accent: "#C20002",
            primary2: "#3E5815",
            hoverd: "#FF4F4D",
            dark: "#1e1b4b",
            secondary: "#312e81",
            blueText: "#1e40af",
            primary: "#1d4ed8",
            blutextbtn: "#2563eb",
            blueText2: "#3b82f6",
            background: "#60a5fa",
            btn: "#93c5fd",
            deleted: "#FF6D4D",
            hoverd: "#FF4F4D",
          },
        },
      },
    };
  </script>

  <div class="min-h-screen bg-gray-100 p-0 sm:p-12 w-1/2
">
    <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
      <h1 class="text-2xl font-bold mb-8 flex flex-col items-center">Add Task </h1>
      <form action="" class=space-y-6" method="post">
        <div>
          <label for="task-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Title</label>
          <input type="text" name="task-title" id="task-title" class="bg-gray-50 border shadow border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white  dark:placeholder-gray-400 dark:text-white" placeholder="Task Title" required>
        </div>
        <div>
          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Description</label>
          <textarea id="task-description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-white   shadow dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your task description here..."></textarea>
        </div>
        <div>
          <label for="lists" class="block mb-2 text-sm font-medium text-gray-300 dark:text-white">Select an option</label>
          <select id="lists" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  shadow dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="to do">To Do</option>
            <option value="in progress">In Progress</option>
            <option value="done">Done</option>
          </select>
        </div>
        <div>
          <label for="date-picker" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due Date</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
              </svg>
            </div>
            <input datepicker datepicker-autohide id="date-picker" type="text" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-white shadow dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
          </div>
        </div>
        <div class="flex justify-between gap-4">
          <input type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" value="Add Task">
          <button type="button" data-modal-hide="task-modal" class="w-full text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>