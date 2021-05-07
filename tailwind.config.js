const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            padding: {
                p0_1: '5px',
                p0_7: '7px',
                p_10: '10px',
                p_12: '12px',
                p1: '100px',
                p0_16: '16px',
                p2: '200px',
                p3: '300px',
                p4: '400px',
                p5: '500px',
                p6: '600px',
                p7: '700px',
                p8: '800px',
                p9: '900px',
                p10: '1000px',
                pvhfull: '50vh',
            },
            width: {
                'w1': '100px',
                'w1_2': '150px',
                'w2': '200px',
                'w3': '300px',
                'w4': '400px',
                'w5': '500px',
                'w6': '600px',
                'w7': '700px',
                'w8': '800px',
                'w9': '900px',
                'w10': '1000px',
                'w11': '1100px',
                'w12': '1200px',
                'w13': '1300px',
                'w14': '1400px',
                'w15': '1500px',
            },
            height: {
                h1: '100px',
                h2: '200px',
                h3: '300px',
                h4: '400px',
                h5: '500px',
                h6: '600px',
                h7: '700px',
                h8: '800px',
                h9: '900px',
                h10: '1000px',
                hv1: '10pvh',
                hv2: '20pvh',
                hv3: '30pvh',
                hv4: '40pvh',
                hv5: '50pvh',
            },
            margin: {
                m1: '100px',
                m2: '200px',
                m2_1: '260px',
                m3: '300px',
                m4: '400px',
                m5: '500px',
                m6: '600px',
                m7: '700px',
                m8: '800px',
                m9: '900px',
                m10: '1000px',
                mvh1: '50vh',
                mvh2: '63vh',
                mvhfull: '100vh',
            },
            container:{
                center:true
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                green:{
                  100:'#009200',
                  150:'#1E8449',
                  200:'#8CBE11',
                  300:'#808000',
                  400:'#34D399', 
                  footer:'#B4045F',
                  300:'#607017',
                  400:'#34D399',
                },
                grey:{
                  100:'#d6d7d8',
                  200:'#A9A9A9',
                  300:'#808080',
                },
                blue:{
                    100:'#2C68C1',
                },
                red:{
                    100:'#C12C2C',
                    200:'#BE0F6F',
                }
              },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
