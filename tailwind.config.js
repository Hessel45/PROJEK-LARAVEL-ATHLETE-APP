import defaultTheme from "tailwindcss/defaultTheme";

import typography from "@tailwindcss/typography";
import forms from "@tailwindcss/forms";
import colors from "tailwindcss/colors";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                heading: ["Bree Serif", ...defaultTheme.fontFamily.serif],
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: colors.emerald,
                secondary: colors.zinc,
            },
            aspectRatio: {
                thumbnail: "4 / 3",
            },
        },
    },

    plugins: [forms, typography],
};
