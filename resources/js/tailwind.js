import * as tailwindComponents from 'vue-tailwind/dist/components';

const {
  TAlert, TButton, TInputGroup, ...defaultComponents
} = tailwindComponents;
const components = {
  TButton: {
    component: tailwindComponents.TButton,
    props: {
      variants: {
        error: 'text-white bg-red-600 hover:bg-red-500 focus:border-red-700 active:bg-red-700 text-sm font-medium border border-transparent px-4 py-2 rounded-md',
        success: 'text-white bg-green-600 hover:bg-green-500 focus:border-green-700 active:bg-green-700 text-sm font-medium border border-transparent px-4 py-2 rounded-md',
        brown: 'text-white bg-yellow-600 hover:bg-yellow-500 focus:border-yellow-700 active:bg-yellow-700 text-sm font-medium border border-transparent px-4 py-2 rounded-md',
      },
    },
  },
  TAlert: {
    component: tailwindComponents.TAlert,
    props: {
      fixedClasses: {
        wrapper: 'relative flex items-center p-4 border-l-4  rounded shadow-sm',
        body: 'flex-grow',
        close: 'absolute relative flex items-center justify-center ml-4 flex-shrink-0 w-6 h-6 transition duration-100 ease-in-out rounded  focus:ring-2 focus:ring-blue-500 focus:outline-none focus:ring-opacity-50',
        closeIcon: 'fill-current h-4 w-4',
      },
      classes: {
        wrapper: 'bg-blue-50 border-blue-500',
        body: 'text-blue-700',
        close: 'text-blue-500 hover:bg-blue-200',
      },
      variants: {
        danger: {
          wrapper: 'bg-red-50 border-red-500',
          body: 'text-red-700',
          close: 'text-red-500 hover:bg-red-200',
        },
        success: {
          wrapper: 'bg-green-50 border-green-500',
          body: 'text-green-700',
          close: 'text-green-500 hover:bg-green-200',
        },
      },
    },
  },
  TInputGroup: {
    component: tailwindComponents.TInputGroup,
    props: {
      fixedClasses: {
        wrapper: '',
        label: 'block',
        body: '',
        feedback: ' text-sm text-sm',
        description: 'text-gray-400 text-sm',
      },
      classes: {
        wrapper: '',
        label: 'text-gray-200',
        body: '',
        feedback: 'text-gray-400',
        description: 'text-gray-400',
      },
      variants: {
        danger: {
          label: 'text-red-500',
          feedback: 'text-red-500',
        },
        success: {
          label: 'text-green-500',
          feedback: 'text-green-500',
        },
      },
    },
  },
  ...defaultComponents,
};
console.log(components);

export default components;
