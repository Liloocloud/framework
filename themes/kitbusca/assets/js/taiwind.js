tailwind.config = {
    theme: {
        darkMode: ['class', '[data-mode="dark"]'],
        extend: {
            colors: {
                clifford: '#da373d',
                kitbusca: {
                    amarelo: '#FFC000'
                }
            },
            fontFamily: {
                inter: ['inter', 'sans-serif'],
                poppins: ['poppins', 'sans-serif'],
                climate: ['Climate Crisis', 'cursive']
            }
        },
        fontSize: {
            '3xl': '1.953rem',
            '4xl': '2.441rem',
            '5xl': '3.052rem',
          }
    }
}