<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    private $list = [
        'William Shakespeare',
        'Leo Tolstoy',
        'Jane Austen',
        'Charles Dickens',
        'Mark Twain',
        'Homer',
        'Fyodor Dostoevsky',
        'Gabriel Garcia Marquez',
        'George Orwell',
        'J.K. Rowling',
        'Ernest Hemingway',
        'F. Scott Fitzgerald',
        'George Bernard Shaw',
        'Harper Lee',
        'Victor Hugo',
        'Hermann Hesse',
        'J.R.R. Tolkien',
        'Agatha Christie',
        'Anton Chekhov',
        'H.G. Wells',
        'Virginia Woolf',
        'Albert Camus',
        'Miguel de Cervantes',
        'H.P. Lovecraft',
        'Rabindranath Tagore',
        'Ayn Rand',
        'T.S. Eliot',
        'James Joyce',
        'Charlotte Brontë',
        'Emily Brontë',
        'Oscar Wilde',
        'Dante Alighieri',
        'Hans Christian Andersen',
        'Jules Verne',
        'Thomas Hardy',
        'Ray Bradbury',
        'Daphne du Maurier',
        'Homer',
        'Tolstoy',
        'Shakespeare',
        'Chekhov',
        'Franz Kafka',
        'Lewis Carroll',
        'Aldous Huxley',
        'E.M. Forster',
        'Isaac Asimov',
        'J.D. Salinger',
        'Kurt Vonnegut',
        'Aristotle',
        'Plato',
        'John Steinbeck',
        'Epicurus',
        'Nathaniel Hawthorne',
        'H.P. Lovecraft',
        'Stephen King',
        'Andrea Baglieri',
        'C.S. Lewis',
        'George R.R. Martin',
        'Isabel Allende',
        'Hermann Hesse',
        'Gabriel Garcia Marquez',
        'Pablo Neruda',
        'Haruki Murakami',
        'Yukio Mishima',
        'Chinua Achebe',
        'Nolan Costa',
        'Chinua Achebe',
        'Wole Soyinka',
        'Gabriel Okara',
        'Ben Okri',
        'Zora Neale Hurston',
        'Maya Angelou',
        'Toni Morrison',
        'James Baldwin',
        'Langston Hughes',
        'Ernest J. Gaines',
        'Alice Walker',
        'Ralph Ellison',
        'Richard Wright',
        'Jamaica Kincaid',
        'Chimamanda Ngozi Adichie',
        'Chinua Achebe',
        'Nawal El Saadawi',
        'Naguib Mahfouz',
        'Kahlil Gibran',
        'Gao Xingjian',
        'Mo Yan',
        'Lu Xun',
        'Yu Hua',
        'Jin Yong',
    ];   
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->list as $author) {
            Author::factory()->create(['name' => $author]);
        }
    }
}
