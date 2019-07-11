drop database if exists web20191series;
create database if not exists web20191series;

use web20191series;

-- UP
create table users (
    id          int primary key auto_increment,
    name        varchar(255),
    email       varchar(255),
    password    varchar(255)
);  

create table series (
    id       int primary key auto_increment,
    name     varchar(255),
    genre    varchar(255),
    seasons  int,
    synopsis text
);

create table users_series (
    user_id         int,
    serie_id        int,
    current_season  boolean,
    current_episode int,
    completed       boolean,
    primary key (user_id, serie_id),
    foreign key (user_id) references users(id),
    foreign key (serie_id) references series(id)
);

-- ENDUP

create user if not exists web20191 identified by 'web20191';
grant all privileges on web20191series.* to web20191;

-- SEED
insert into users (name, email, password) values
    ('Tony Stark', 'tony@stark.co', 'pepper'),
    ('Bruce Banner', 'bruce@avengers.com', 'natasha'),
    ('Bruce Wayne', 'bruce@wayne.tech', 'alfred');

insert into series (name, genre, seasons, synopsis) values
    ('The Big Bang Theory', 'Comedy', 12, '...'),
    ('Supernatural', 'Terror', 14, '...'),
    ('Breaking Bad', 'Drama', 5, '...'),
    ('La Casa de Papel', 'Police',  2, '...');

insert into users_series (user_id, serie_id, current_season, current_episode) values
    (1, 1, 1, 1),
    (1, 2, 2, 4),
    (1, 3, 1, 8),
    (2, 2, 10, 2),
    (2, 3, 8, 3),
    (3, 3, 1, 2);
-- ENDSEED


--
-- INSTRUÇÕES
--
-- Este é um sistema rudimentar de cadastro de séries, onde usuários podem cadastrar as séries que estão assistindo e em qual temporada (season) /  episódio pararam.
--
-- (1,0) Deve ter uma tela inicial que lista todos as séries já cadastradas na plataforma, ordenadas pela quantidade de pessoas que estão assistindo (quanto mais pessoas têm algum registro dessa série, melhor a colocação).
-- (1,0) Deve ter uma tela de registro de usuários, onde novos usuários podem se cadastrar. Não deve ser permitido que um usuário se cadastre com um e-mail que já está cadastrado no sistema.
-- (1,0) Deve ter uma tela de login, onde um usuário pode acessar o sistema (voltando para a tela inicial, com mais opções (descritas adiante)), apenas com e-mail e senha corretos.
-- (1,0) A tela inicial para usuários logados deve listar todos as sérias já cadastradas, priorizando as séries que o usuário está assistindo, seguidas pelos demais.
-- (1,0) Na tela para usuários logados deve ter: (1) um link para adicionar uma nova série, (2) para cada série, uma ou duas ações, de acordo com a seguinte regra: se um usuário não está assistindo uma série (não tem registro na tabela users_series), então deve um link para "estou assistindo"; caso contrário, deve ter um link para "não vou mais assistir" e um pequeno formuário, onde o usuário pode escolher em qual temporada / episódio está.
-- Rota 1:
    -- (2,0) O usuário, após logado, deve ter um link com uma tela onde ele pode atualizar seus dados.
    -- (1,0) Deve ter uma tela onde um usuário pode adicionar uma nova série, com os seus dados.
    -- (2,0) Cada série deve ter um link com uma tela para editar seus dados.
-- Rota 2:
    -- (1,0) O link para "estou assistindo" deve inserir um registro na tabela "users_series", assumindo que o usuário está começando na primeira temporada, primeiro episódio.
    -- (1,0) O link para "não vou mais assistir" deve remover o registro do usuário da tabela "users_series".
    -- (1,0) O formulário deve atualizar os dados do registro do usuário / série na tabela "users_series".
    -- (1,0) As ações de "estou assistindo", "não vou mais assistir" e de submeter o formulário devem ser executadas de forma assíncrona, atualizando naturalmente as linhas na tabela de exibição.
-- Extra:
    -- (1,0) Para as séries que o usuário está acompanhando, adicione uma nova ação - "concluído". Esta ação deve atualizar a coluna "completed" na tabela "users_series".
    -- (1,0) Faça esta ação ser executada de forma assíncrona.
    -- (1,0) Deixe seu sistema seguro contra ataques de SQL injection.
    -- (1,0) Utilize um framework de CSS / JS de forma a melhorar a aparência e usabilidade do sistema.

--
-- Consultas mais complexas =)
--
-- select *, (select count(*) from users_series where serie_id = series.id) count_users from series order by count_users desc, name; -- seleciona as séries ordenadas pela quantidade de pessoas que os adicionaram
-- select series.*, users_series.current_season current_season, users_series.current_episode current_episode from series left join users_series on users_series.serie_id = series.id and users_series.user_id = 2 order by users_series.current_season desc, series.name; -- lista todos os filmes, priorizando os que o usuário 2 adicionou, seguido pelos não adicionados


