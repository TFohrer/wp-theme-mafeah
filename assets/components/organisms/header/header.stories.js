export default {
    title: 'Organism/Header',
    argTypes: {
        title: { control: 'text' },
    },
}

//import { text } from '@storybook/addon-knobs'
import template from './header.twig'

export const Primary = args => template({ ...args })

Primary.args = {
    title: 'Test Title',
}
