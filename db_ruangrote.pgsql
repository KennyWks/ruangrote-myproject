--
-- PostgreSQL database dump
--

-- Dumped from database version 13.4
-- Dumped by pg_dump version 13.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: uuid-ossp; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS "uuid-ossp" WITH SCHEMA public;


--
-- Name: EXTENSION "uuid-ossp"; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION "uuid-ossp" IS 'generate universally unique identifiers (UUIDs)';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: dokumen_desa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.dokumen_desa (
    id_dokumen uuid DEFAULT public.uuid_generate_v4() NOT NULL,
    id_desa uuid,
    tahun character varying(4),
    rpjm character varying(100),
    rkp character varying(100),
    apbd character varying(100),
    pj_sm1 character varying(100),
    pj_sm2 character varying(100),
    kegiatan_prioritas character varying(100),
    peraturan character varying(100),
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);


ALTER TABLE public.dokumen_desa OWNER TO postgres;

--
-- Name: kegiatan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.kegiatan (
    id_kegiatan uuid DEFAULT public.uuid_generate_v4() NOT NULL,
    id_desa uuid,
    judul character varying(50),
    foto character varying(100),
    keterangan character varying(200),
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);


ALTER TABLE public.kegiatan OWNER TO postgres;

--
-- Name: pengaduan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pengaduan (
    id_aduan uuid DEFAULT public.uuid_generate_v4() NOT NULL,
    instansi character varying(50),
    nama character varying(60),
    email character varying(50),
    subjek character varying(50),
    isi character varying(200),
    kategori character varying(50),
    tag character varying(40),
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);


ALTER TABLE public.pengaduan OWNER TO postgres;

--
-- Name: produk_hukum; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produk_hukum (
    id_prokum uuid DEFAULT public.uuid_generate_v4() NOT NULL,
    id_desa uuid,
    produk_hukum character varying(100),
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);


ALTER TABLE public.produk_hukum OWNER TO postgres;

--
-- Name: profil_desa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.profil_desa (
    id_desa uuid DEFAULT public.uuid_generate_v4() NOT NULL,
    nama_desa character varying(50),
    kecamatan character varying(60),
    kota_kab character varying(60),
    provinsi character varying(50),
    kontak character varying(50),
    alamat character varying(100),
    foto_struktur character varying(100),
    username character varying(50),
    password character varying(50),
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);


ALTER TABLE public.profil_desa OWNER TO postgres;

--
-- Name: publikasi_desa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.publikasi_desa (
    id_publikasi uuid DEFAULT public.uuid_generate_v4() NOT NULL,
    id_desa uuid,
    judul character varying(50),
    isi character varying(200),
    instansi character varying(50),
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);


ALTER TABLE public.publikasi_desa OWNER TO postgres;

--
-- Name: superadmin; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.superadmin (
    id_admin uuid DEFAULT public.uuid_generate_v4() NOT NULL,
    username character varying(28),
    password character varying(100),
    email character varying(50),
    nama_lengkap character varying(60),
    notelp character varying(18)
);


ALTER TABLE public.superadmin OWNER TO postgres;

--
-- Data for Name: dokumen_desa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.dokumen_desa (id_dokumen, id_desa, tahun, rpjm, rkp, apbd, pj_sm1, pj_sm2, kegiatan_prioritas, peraturan, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: kegiatan; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.kegiatan (id_kegiatan, id_desa, judul, foto, keterangan, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: pengaduan; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pengaduan (id_aduan, instansi, nama, email, subjek, isi, kategori, tag, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: produk_hukum; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.produk_hukum (id_prokum, id_desa, produk_hukum, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: profil_desa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.profil_desa (id_desa, nama_desa, kecamatan, kota_kab, provinsi, kontak, alamat, foto_struktur, username, password, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: publikasi_desa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.publikasi_desa (id_publikasi, id_desa, judul, isi, instansi, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: superadmin; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.superadmin (id_admin, username, password, email, nama_lengkap, notelp) FROM stdin;
a82719a8-1e03-4773-bf39-619ba1dff9a1	bobet	202cb962ac59075b964b07152d234b70	bobet@gmail.com	Bobet Nahas	0821321232382
c7aef4a4-105e-4b6a-8d65-917454ff7005	fajar	202cb962ac59075b964b07152d234b70	fajar@gmail.com	Fajar Magsyar	0821327912382
\.


--
-- Name: dokumen_desa dokumen_desa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dokumen_desa
    ADD CONSTRAINT dokumen_desa_pkey PRIMARY KEY (id_dokumen);


--
-- Name: kegiatan kegiatan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kegiatan
    ADD CONSTRAINT kegiatan_pkey PRIMARY KEY (id_kegiatan);


--
-- Name: pengaduan pengaduan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pengaduan
    ADD CONSTRAINT pengaduan_pkey PRIMARY KEY (id_aduan);


--
-- Name: produk_hukum produk_hukum_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produk_hukum
    ADD CONSTRAINT produk_hukum_pkey PRIMARY KEY (id_prokum);


--
-- Name: profil_desa profil_desa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.profil_desa
    ADD CONSTRAINT profil_desa_pkey PRIMARY KEY (id_desa);


--
-- Name: publikasi_desa publikasi_desa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.publikasi_desa
    ADD CONSTRAINT publikasi_desa_pkey PRIMARY KEY (id_publikasi);


--
-- Name: superadmin superadmin_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.superadmin
    ADD CONSTRAINT superadmin_pkey PRIMARY KEY (id_admin);


--
-- Name: dokumen_desa dokumen_desa_id_desa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dokumen_desa
    ADD CONSTRAINT dokumen_desa_id_desa_fkey FOREIGN KEY (id_desa) REFERENCES public.profil_desa(id_desa);


--
-- Name: kegiatan kegiatan_id_desa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kegiatan
    ADD CONSTRAINT kegiatan_id_desa_fkey FOREIGN KEY (id_desa) REFERENCES public.profil_desa(id_desa);


--
-- Name: produk_hukum produk_hukum_id_desa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produk_hukum
    ADD CONSTRAINT produk_hukum_id_desa_fkey FOREIGN KEY (id_desa) REFERENCES public.profil_desa(id_desa);


--
-- Name: publikasi_desa publikasi_desa_id_desa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.publikasi_desa
    ADD CONSTRAINT publikasi_desa_id_desa_fkey FOREIGN KEY (id_desa) REFERENCES public.profil_desa(id_desa);


--
-- PostgreSQL database dump complete
--

